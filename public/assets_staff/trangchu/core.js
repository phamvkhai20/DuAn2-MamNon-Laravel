/**
 * core js
 * 
 * @package Coniu v1.1
 * @author NOGA Co., Ltd
 */

// initialize API URLs
var api = [];
api['core/translator']  = ajax_path+"core/translator.php";
api['data/load'] = ajax_path+"data/load.php";
api['data/search'] = ajax_path+"data/search.php";
api['class/export'] = ajax_path+"ci/bo/class/boclass_export.php";
api['school/search'] = ajax_path + "ci/bo/bo_search.php";
api['school/parentlist'] = ajax_path + "ci/bo/bo_parentlist.php";
api['school/cookie'] = ajax_path + "ci/bo/school/bo_cookie.php";
api['core/session'] = ajax_path + "core/change_session.php";
var str_locale = ($('html').attr('lang') == 'en_us' ? 'en' : 'vi');


// is_empty
function is_empty(value) {
    if (value.match(/\S/) == null) {
        return true;
    } else  {
        return false;
    }
}

// initialize the plugins
function initialize() {
    // Xử lý cho thanh footer luôn dính bot
    $('body').ready(function () {
        var container_height = $('.main-wrapper .height_min').height();
        var window_height = $(window).height();
        var height_union = window_height - container_height;
        if(height_union > 150) {
            var height_after = window_height - 150;
            // set height container
            $('.main-wrapper .height_min').css('min-height', height_after);
        }
    });

    // run bootstrap tooltip
    $('body').tooltip({
        selector: '[data-toggle="tooltip"], [data-tooltip=tooltip]'
    });

    // run metisMenu
    $(".js_metisMenu").metisMenu();

    /*$(document).ready(function() {
        $('.js_autogrow').autogrow({'animate': false});
    });*/

    // run autosize (expand textarea) plugin
    autosize($('.js_autosize'));

    // run moment plugin

    $(".js_moment").each(function(){
        var _this = $(this);
        var time_utc = _this.data('time');
        //var offset = moment().utcOffset();
        var time = moment(time_utc).locale(str_locale);
        //_this.text(time.fromNow()).attr('title', time.format("dddd, MMMM D, YYYY h:m a"));
        _this.text(time.fromNow()).attr('title', time.format("D MMMM YYYY [lúc] HH:mm"));
    });

    // run slimScroll plugin
    $('.js_scroller').each(function(){
        var _this = $(this);
        /* return if the plugin already running  */
        if(_this.parent('.slimScrollDiv').length > 0) {
            return;
        }
        /* run if not */
        _this.slimScroll({
            height: _this.attr('data-slimScroll-height') || '280px',
            start: _this.attr('data-slimScroll-start') || 'top',
            distance: '2px'
        })
    });

    // run readmore
    $('.js_readmore').each(function(){
        var _this = $(this);
        var height = _this.attr('data-height') || 200;
        /* return if the plugin already running  */
        if(_this.attr('data-readmore') !== undefined) {
            return;
        }
        /* run if not */
        _this.readmore({
            collapsedHeight: height,
            moreLink: '<a href="#">'+__["Read more"]+'</a>',
            lessLink: '<a href="#">'+__["Read less"]+'</a>'
        });
    });

    // run mediaelementplayer plugin
    $('video.js_mediaelementplayer, audio.js_mediaelementplayer').mediaelementplayer();
}

// modal
function modal() {
    if(arguments[0] == "#modal-login") {
        /* disable the backdrop (don't close modal when click outside) */
        if($('#modal').data('bs.modal')) {
            $('#modal').data('bs.modal').options = {backdrop: 'static', keyboard: false};
        } else {
            $('#modal').modal({backdrop: 'static', keyboard: false});
        }
    }
    /* check if the modal not visible, show it */
    if(!$('#modal').is(":visible")) $('#modal').modal('show');
    /* update the modal-content with the rendered template */
    $('.modal-content:last').html( render_template(arguments[0], arguments[1]) );
    /* initialize modal if the function defined (user logged in) */
    if(typeof initialize_modal === "function") {
        initialize_modal();
    }
}

// confirm
function confirm(title, message, callback) {
    modal('#modal-confirm', {'title': title, 'message': message});
    $("#modal-confirm-ok").click( function() {
        $('#modal-confirm-ok').hide();
        // $('.modal-backdrop').hide();
        if(callback) callback();
    });
}

// render template
function render_template(selector, options) {
    var template = $(selector).html();
    Mustache.parse(template);
    var rendered_template = Mustache.render(template, options);
    return rendered_template;
}

/* Hàm delay khi search (trong khi người dùng đang nhập text thì không seach, sau khi nhập 1s mới search*/
function search_delay(callback, ms) {
    var timer = 0;
    return function() {
        var context = this, args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function () {
            callback.apply(context, args);
        }, ms || 0);
    };
}

// load more
function load_more(element) {
    if(element.hasClass('done') || element.hasClass('loading')) return;
    var _this = element;
    var loading = _this.find('.loader');
    var text = _this.find('span');
    var remove = _this.data('remove') || false;
    var stream = _this.parent().find('ul:first');
    /* prepare data object */
    var data = {};
    data['get'] = _this.data('get');
    data['pos'] = _this.data('pos');
    if(_this.data('pos') !== undefined) {
        data['pos'] = _this.data('pos');
    } else {
        data['pos'] = '';
    }
    if(_this.data('filter') !== undefined) {
        data['filter'] = _this.data('filter');
    }
    if(_this.data('type') !== undefined) {
        data['type'] = _this.data('type');
    }
    if(_this.data('uid') !== undefined) {
        data['uid'] = _this.data('uid');
    }
    if(_this.data('id') !== undefined) {
        data['id'] = _this.data('id');
    }
    data['offset'] = _this.data('offset') || 1; /* we start from iteration 1 because 0 already loaded */
    /* show loader & hide text */
    _this.addClass('loading');
    text.hide();
    loading.removeClass('x-hidden');
    /* get & load data */
    $.post(api['data/load'], data, function(response) {
        _this.removeClass('loading');
        text.show();
        loading.addClass('x-hidden');
        /* check the response */
        if(response.callback) {
            eval(response.callback);
        } else {
            if(response.data) {
                data['offset']++;
                if(response.append) {
                    stream.append(response.data);
                } else {
                    stream.prepend(response.data);
                }
                setTimeout(photo_grid(), 200);
            } else {
                if(remove) {
                    _this.remove();
                } else {
                    _this.addClass('done');
                    text.text(__['There is no more data to show']);
                }
            }
        }
        _this.data('offset', data['offset']);
    }, 'json')
        .fail(function() {
            _this.removeClass('loading');
            text.show();
            loading.addClass('x-hidden');
            modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
        });
}

// photo grid
function photo_grid() {
    /* main photo */
    $('.pg_2o3_in').each(function() {
        if($(this).parents('.pg_3x').length > 0) {
            var width = height = $(this).parents('.pg_3x').width() * 0.667;
        }
        if($(this).parents('.pg_4x').length > 0) {
            var width = height = $(this).parents('.pg_4x').width() * 0.749;
        }
        $(this).width(width);
        $(this).height(height);
    });
    /* side photos */
    $('.pg_1o3_in').each(function() {
        if($(this).parents('.pg_3x').length > 0) {
            var width = $(this).parents('.pg_3x').width() * 0.332;
            var height = ($(this).parent('.pg_1o3').prev().height() - 1) / 2;
        }
        if($(this).parents('.pg_4x').length > 0) {
            var width = $(this).parents('.pg_4x').width() * 0.25;
            var height = ($(this).parent('.pg_1o3').prev().height() - 2) / 3;
        }
        $(this).width(width);
        $(this).height(height);
    });
}


// destroy slimScrol
function destroy_slimScrol(element) {
    if($(element).parent().hasClass('slimScrollDiv')) {
        $(element).parent().replaceWith($(element));
        $(element).removeAttr('style');
    }
}

// set cookie
function createCookie(name, value, days) {
    var expires;

    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    } else {
        expires = "";
    }
    document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/";
}

/*function readCookie(name) {
    var nameEQ = encodeURIComponent(name) + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === ' ')
            c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0)
            return decodeURIComponent(c.substring(nameEQ.length, c.length));
    }
    return null;
}*/

/*function eraseCookie(name) {
    createCookie(name, "", -1);
}*/


// Ẩn popup thông báo trên màn hình sau khoảng thời gian - TaiLA
function modal_hidden(time) {
    setTimeout(function(){
        $("#modal").modal('hide');
        $(".modal-backdrop").hide();
        // $("#modal").removeClass('hidden');
    }, time);
    $("#modal").modal('show');
    $(".modal-backdrop").show();
}


$(function() {

    // init plugins
    initialize();
    $(document).ajaxComplete(function() {
        initialize();
    });

    
    // run fastlink plugin
    FastClick.attach(document.body);

    // init offcanvas-sidebar
    $('[data-toggle=offcanvas]').click(function() {
        $('.offcanvas').toggleClass('active');
    });

    // run sticky-sidebar
    if($(window).width() > 750) { // Desktops (≥768px)
        var iScrollPos = 0;
        $(window).scroll(function () {
            var orginal_width = $('.js_sticky-sidebar').width();
            var iCurScrollPos = $(this).scrollTop();
            if((iCurScrollPos - iScrollPos > 20) || (iScrollPos - iCurScrollPos > 20)) {
                if(iCurScrollPos > iScrollPos) {
                    $('.js_sticky-sidebar').removeAttr('style');
                    $('.js_sticky-sidebar').addClass('fixed');
                    $('.js_sticky-sidebar').width(orginal_width);
                    var sidebar_height = $('.js_sticky-sidebar').height();
                    var window_height = $(window).height();
                    if(window_height < sidebar_height) {
                        var top = window_height - sidebar_height;
                        $('.js_sticky-sidebar').css({'top': top, "position": "fixed"});
                        $('.offcanvas-mainbar').css("float", "right");
                    } else {
                        $('.js_sticky-sidebar').css({'top': "56px", "position": "fixed"});
                        $('.offcanvas-mainbar').css("float", "right");
                    }
                } else {
                    // $('.js_sticky-sidebar').removeClass('fixed');
                    $('.js_sticky-sidebar').removeAttr('style');
                    $('.js_sticky-sidebar').width(orginal_width);
                    $('.js_sticky-sidebar').css({'top': "56px", "position": "fixed"});
                    $('.offcanvas-mainbar').css("float", "right");
                }
                iScrollPos = iCurScrollPos;
            }
        })
    }

    // run autogrow (expand textarea) plugin
    $('.js_autogrow').autogrow({'animate': false});

    // run photo grid
    photo_grid();
    $(window).on("resize", function () {
        setTimeout(photo_grid(), 200);
    });


    // run bootstrap modal
    $('body').on('click', '[data-toggle="modal"]', function(e) {
        e.preventDefault();
        var url = $(this).data('url');
        var options = $(this).data('options');
        if (url.indexOf('#') == 0) {
            /* open already loaded modal with #id */
            modal(url, options);
        } else {
            /* get & load modal from url */
            $.getJSON(ajax_path+url, function(response) {
                /* check the response */
                if(!response) return;
                /* check if there is a callback */
                if(response.callback) {
                    eval(response.callback);
                }
            })
                .fail(function() {
                    modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
                });
        }
    });


    // bootsrap dropdown keep open (and for slimScrollBar)
    $('body').on('click', '.js_dropdown-keepopen, .slimScrollBar', function (e) {
        e.stopPropagation();
    });


    // run bootstrap btn-group
    $('body').on('click', '.btn-group a', function (e) {
        e.preventDefault();
        var parent = $(this).parents('.btn-group');
        /* change the value */
        parent.find('input[type="hidden"]').val($(this).data('value'));
        /* copy text to btn-group-text */
        parent.find('.btn-group-text').text($(this).text());
        /* copy icon to btn-group-icon */
        parent.find('.btn-group-icon').attr("class", $(this).find('i.fa').attr("class")).addClass('btn-group-icon');
        /* copy title to tooltip */
        parent.data('original-title', $(this).data('title'));
        parent.data('value', $(this).data('value'));
        parent.tooltip();
    });


    // run toggle-panel
    $('.js_toggle-panel').click(function(event){
        event.preventDefault;
        var parent = $(this).parents('.panel-body');
        parent.hide();
        parent.siblings().fadeIn();
        return false;
    });


    // run ajax-forms
    // $('body').on('submit', '.js_ajax-forms', function(e) {
    //     e.preventDefault();
    //     var _this = $(this);
    //     var url = _this.attr('data-url');
    //     var submit = _this.find('button[type="submit"]');
    //     var error = _this.find('.alert.alert-danger');
    //     var success = _this.find('.alert.alert-success');
    //     /* show any collapsed section if any */
    //     if(_this.find('.js_hidden-section').length > 0 && !_this.find('.js_hidden-section').is(':visible')) {
    //         _this.find('.js_hidden-section').slideDown();
    //         return false;
    //     }
    //     /* show loading */
    //     submit.data('text', submit.html());
    //     submit.prop('disabled', true);
    //     submit.html(__['Loading']);
    //     /* get ajax response */
    //     $.post(ajax_path+url, $(this).serialize(), function(response) {
    //         submit.html(submit.data('text'));
    //         /* handle response */
    //         if(response.error) {
    //             /* hide loading */
    //             submit.prop('disabled', false); //QuanND
    //             if(success.is(":visible")) success.hide(); // hide previous alert
    //             error.html(response.message).slideDown();
    //         } else if(response.success) {
    //             if(error.is(":visible")) error.hide(); // hide previous alert
    //             success.html(response.message).slideDown();
    //         } else {
    //             eval(response.callback);
    //         }
    //     }, "json")
    //     .fail(function() {
    //         /* hide loading */
    //         submit.prop('disabled', false);
    //         submit.html(submit.data('text'));
    //         /* handle error */
    //         if(success.is(":visible")) success.hide(); // hide previous alert
    //         error.html(__['There is something that went wrong!']).slideDown();
    //     });
    // });

    // run ajax-forms
    $('body').on('submit', '.js_ajax-forms', function(e) {
        e.preventDefault();
        var _this = $(this);
        var url = _this.attr('data-url');
        var submit = _this.find('button[type="submit"]');
        // var error = $("div#messeage").find('.alert.alert-danger-load');
        // var success = $("div#messeage").find('.alert.alert-success-load');
        /* show any collapsed section if any */
        if(_this.find('.js_hidden-section').length > 0 && !_this.find('.js_hidden-section').is(':visible')) {
            _this.find('.js_hidden-section').slideDown();
            return false;
        }
        /* show loading */
        submit.data('text', submit.html());
        submit.prop('disabled', true);
        submit.html(__['Loading']);

        // Show loading
        $("#loading_full_screen").removeClass('hidden');
        $("#modal").removeClass('hidden');
        /* get ajax response */
        $.post(ajax_path+url, $(this).serialize(), function(response) {
            submit.html(submit.data('text'));

            // Hidden loading
            $("#loading_full_screen").addClass('hidden');

            /* handle response */
            if(response.error) {
                /* hide loading */
                // $("#messeage").removeClass('hidden');
                submit.prop('disabled', false); //QuanND
                // if(success.is(":visible")) success.hide(); // hide previous alert
                // error.html(response.message).slideDown();
                modal('#modal-error', {title: __['Error'], message: response.message});
            } else if(response.success) {
                // if(error.is(":visible")) error.hide(); // hide previous alert
                // success.html(response.message).slideDown();
                submit.prop('disabled', true);
                modal('#modal-success', {title: __['Success'], message: response.message});
                modal_hidden(1500);
            } else if(response.callback){
                eval(response.callback);
            } else {
                window.location.reload();
            }
        }, "json")
            .fail(function() {
                /* hide loading */
                submit.prop('disabled', false);
                submit.html(submit.data('text'));

                // Hidden loading
                $("#loading_full_screen").addClass('hidden');
                /* handle error */
                // if(success.is(":visible")) success.hide(); // hide previous alert
                // error.html(__['There is something that went wrong!']).slideDown();
                modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
            });
    });

    // run ajax-forms
    $('body').on('submit', '.js_ajax-forms-confirm', function(e) {
        e.preventDefault();
        var _this = $(this);
        var url = _this.attr('data-url');
        var submit = _this.find('button[type="submit"]');
        // var error = $("div#messeage").find('.alert.alert-danger-load');
        // var success = $("div#messeage").find('.alert.alert-success-load');
        /* show any collapsed section if any */
        if(_this.find('.js_hidden-section').length > 0 && !_this.find('.js_hidden-section').is(':visible')) {
            _this.find('.js_hidden-section').slideDown();
            return false;
        }
        /* show loading */
        submit.data('text', submit.html());
        submit.prop('disabled', true);
        submit.html(__['Loading']);

        confirm(__['Actions'], __['Are you sure you want to do this?'], function () {
            // Show loading
            $("#loading_full_screen").removeClass('hidden');
            $("#modal").removeClass('hidden');
            /* get ajax response */
            $.post(ajax_path+url, _this.serialize(), function(response) {
                submit.html(submit.data('text'));

                // Hidden loading
                $("#loading_full_screen").addClass('hidden');

                /* handle response */
                if(response.error) {
                    /* hide loading */
                    // $("#messeage").removeClass('hidden');
                    submit.prop('disabled', false); //QuanND
                    // if(success.is(":visible")) success.hide(); // hide previous alert
                    // error.html(response.message).slideDown();
                    modal('#modal-error', {title: __['Error'], message: response.message});
                } else if(response.success) {
                    // if(error.is(":visible")) error.hide(); // hide previous alert
                    // success.html(response.message).slideDown();
                    submit.prop('disabled', true);
                    modal('#modal-success', {title: __['Success'], message: response.message});
                    modal_hidden(1500);
                } else if(response.callback){
                    eval(response.callback);
                } else {
                    window.location.reload();
                }
            }, "json")
                .fail(function() {
                    /* hide loading */
                    submit.prop('disabled', false);
                    submit.html(submit.data('text'));

                    // Hidden loading
                    $("#loading_full_screen").addClass('hidden');
                    /* handle error */
                    // if(success.is(":visible")) success.hide(); // hide previous alert
                    // error.html(__['There is something that went wrong!']).slideDown();
                    modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
                });
        });
    });

    // run ajax-forms not show modal
    $('body').on('submit', '.js_ajax_not_modal-forms', function(e) {
        e.preventDefault();
        var _this = $(this);
        var url = _this.attr('data-url');
        var submit = _this.find('button[type="submit"]');
        var error = _this.find('.alert.alert-danger');
        var success = _this.find('.alert.alert-success');
        /* show any collapsed section if any */
        if(_this.find('.js_hidden-section').length > 0 && !_this.find('.js_hidden-section').is(':visible')) {
            _this.find('.js_hidden-section').slideDown();
            return false;
        }
        /* show loading */
        submit.data('text', submit.html());
        submit.prop('disabled', true);
        submit.html(__['Loading']);
        /* get ajax response */
        $.post(ajax_path+url, $(this).serialize(), function(response) {
            var disableSave = true;
            if (!response.disableSave) disableSave = false;

            submit.html(submit.data('text'));
            /* handle response */
            if(response.error) {
                /* hide loading */
                submit.prop('disabled', false); //QuanND
                if(success.is(":visible")) success.hide(); // hide previous alert
                error.html(response.message).slideDown();
            } else if(response.success) {
                if(error.is(":visible")) error.hide(); // hide previous alert
                success.html(response.message).slideDown();
            } else {
                eval(response.callback);
            }
            submit.prop('disabled', response.disableSave);
        }, "json")
        .fail(function() {
            /* hide loading */
            submit.prop('disabled', false);
            submit.html(submit.data('text'));
            /* handle error */
            if(success.is(":visible")) success.hide(); // hide previous alert
            error.html(__['There is something that went wrong!']).slideDown();
        });
    });


    // run ajax-forms (thông báo thành công xong reload)
    $('body').on('submit', '.js_ajax-forms-success-reload', function(e) {
        e.preventDefault();
        var _this = $(this);
        var url = _this.attr('data-url');
        var submit = _this.find('button[type="submit"]');
        // var error = $("div#messeage").find('.alert.alert-danger-load');
        // var success = $("div#messeage").find('.alert.alert-success-load');
        /* show any collapsed section if any */
        if(_this.find('.js_hidden-section').length > 0 && !_this.find('.js_hidden-section').is(':visible')) {
            _this.find('.js_hidden-section').slideDown();
            return false;
        }
        /* show loading */
        submit.data('text', submit.html());
        submit.prop('disabled', true);
        submit.html(__['Loading']);

        // Show loading
        $("#loading_full_screen").removeClass('hidden');
        $("#modal").removeClass('hidden');
        /* get ajax response */
        $.post(ajax_path+url, $(this).serialize(), function(response) {
            submit.html(submit.data('text'));

            // Hidden loading
            $("#loading_full_screen").addClass('hidden');

            /* handle response */
            if(response.error) {
                /* hide loading */
                // $("#messeage").removeClass('hidden');
                submit.prop('disabled', false); //QuanND
                // if(success.is(":visible")) success.hide(); // hide previous alert
                // error.html(response.message).slideDown();
                modal('#modal-error', {title: __['Error'], message: response.message});
            } else if(response.success) {
                // if(error.is(":visible")) error.hide(); // hide previous alert
                // success.html(response.message).slideDown();
                submit.prop('disabled', true);
                modal('#modal-success', {title: __['Success'], message: response.message});
                modal_hidden(1500);
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                submit.prop('disabled', true);
                // modal('#modal-success', {title: __['Success'], message: response.message});
                setTimeout(function () {
                    eval(response.callback);
                }, 1500);
            }
        }, "json")
            .fail(function() {
                /* hide loading */
                submit.prop('disabled', false);
                submit.html(submit.data('text'));

                // Hidden loading
                $("#loading_full_screen").addClass('hidden');
                /* handle error */
                // if(success.is(":visible")) success.hide(); // hide previous alert
                // error.html(__['There is something that went wrong!']).slideDown();
                modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
            });
    });

    // run translator
    $('body').on('click', '.js_translator', function() {
        var language = $(this).data('language');
        /* set language */
        $.post(api['core/translator'], {'language': language}, function(response) {
            /* check the response */
            if(!response) return;
            /* check if there is a callback */
            if(response.callback) {
                eval(response.callback);
            }
        }, 'json')
            .fail(function() {
                modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
            });
    });


    // run load-more
    /* load more data by click */
    $('body').on('click', '.js_see-more', function () {
        load_more($(this));
    });
    /* load more data by scroll */
    $('.js_see-more-infinite').bind('inview', function (event, visible) {
        if(visible == true) {
            load_more($(this));
        }
    });

    // run search
    /* show and get the search results */
    $('body').on('keyup', '#search-input', search_delay(function() {
        var query = $(this).val();
        if(!is_empty(query)) {
            $('#search-history').hide();
            $('#search-results').show();
            var hashtags = query.match(/#(\w+)/ig);
            if(hashtags !== null && hashtags.length > 0) {
                var query = hashtags[0].replace("#", "");
                $('#search-results .dropdown-widget-header').hide();
                $('#search-results-all').hide();
                $('#search-results .dropdown-widget-body').html(render_template('#search-for', {'query': query, 'hashtag': true}));
            } else {
                $.post(api['data/search'], {'query': query}, function(response) {
                    if(response.callback) {
                        eval(response.callback);
                    } else if(response.results) {
                        $('#search-results .dropdown-widget-header').show();
                        $('#search-results-all').show();
                        $('#search-results .dropdown-widget-body').html(response.results);
                        $('#search-results-all').attr('href', site_path+'/search/'+query);
                    } else {
                        $('#search-results .dropdown-widget-header').hide();
                        $('#search-results-all').hide();
                        $('#search-results .dropdown-widget-body').html(render_template('#search-for', {'query': query}));
                    }
                }, 'json');
            }
        }
    }, 1000));
    /* submit search form */
    $('body').on('keydown', '#search-input', function(event) {
        if(event.keyCode == 13) {
            event.preventDefault;
            var query = $(this).val();
            if(!is_empty(query)) {
                var hashtags = query.match(/#(\w+)/ig);
                if(hashtags !== null && hashtags.length > 0) {
                    var query = hashtags[0].replace("#", "");
                    window.location = site_path+'/search/hashtag/'+query
                } else {
                    window.location = site_path+'/search/'+query
                }
            }
            return false;
        }
    });
    /* show previous search (results|history) when the search-input is clicked */
    $('body').on('click', '#search-input', function() {
        if($(this).val() != '') {
            $('#search-results').show();
        } else {
            $('#search-history').show();
        }
    });
    /* hide the search (results|history) when clicked outside search-input */
    $('body').on('click', function(e) {
        if(!$(e.target).is("#search-input")) {
            $('#search-results, #search-history').hide();
        }
    });
    /* submit search form */
    $('body').on('submit', '.js_search-form', function(e) {
        e.preventDefault;
        var query = this.query.value;
        var handle = $(this).data('handle');
        console.log(handle);
        if(!is_empty(query)) {
            if(handle !== undefined) {
                window.location = site_path+'/'+handle+'/search/'+query
            } else {
                var hashtags = query.match(/#(\w+)/ig);
                if(hashtags !== null && hashtags.length > 0) {
                    var query = hashtags[0].replace("#", "");
                    window.location = site_path+'/search/hashtag/'+query
                } else {
                    window.location = site_path+'/search/'+query
                }
            }
        }
        return false;
    });

    // run YouTube player
    $('body').on('click', '.youtube-player', function() {
        $(this).html('<iframe src="https://www.youtube.com/embed/'+$(this).data('id')+'?autoplay=1" frameborder="0" allowfullscreen="1"></iframe>');
    });

    // Export newfeed
    $('body').on('click', '.js_group-export', function() {
        var handle = $(this).attr('data-handle');
        var username = $(this).attr('data-username');
        var begin = $('#begin').val();
        var end = $('#end').val();
        $.post(api['class/export'], {
            'do': handle,
            'username': username,
            'begin': begin,
            'end': end
        }, function (response) {
            var $a = $("<a>");
            $a.attr("href", response.file);
            $("body").append($a);
            $a.attr("download",response.file_name);
            $a[0].click();
            $a.remove();
        }, 'json')
            .fail(function () {
                modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
            });
    });

    $('#export_beginpicker_new').datetimepicker({
        format: DATE_FORMAT,
        defaultDate: new Date()
    });
    $('#export_endpicker_new').datetimepicker({
        format: DATE_FORMAT,
        defaultDate: new Date()
    });
    $("#export_beginpicker_new").on("dp.change", function (e) {
        $('#export_endpicker_new').data("DateTimePicker").minDate(e.date);
    });
    $('#child_pregnant').on('change', function () {
        var not_pregnant = $('#not_pregnant');
        var is_pregnant = $('#is_pregnant');
        var child_pregnant = $('#child_pregnant');
        if (child_pregnant.is(':checked')) {
            if(!not_pregnant.hasClass('x-hidden')) {
                not_pregnant.addClass('x-hidden');
            }
            if(is_pregnant.hasClass('x-hidden')) {
                is_pregnant.removeClass('x-hidden');
            }
        } else {
            if(not_pregnant.hasClass('x-hidden')) {
                not_pregnant.removeClass('x-hidden');
            }
            if(!is_pregnant.hasClass('x-hidden')) {
                is_pregnant.addClass('x-hidden');
            }
        }
    });
    //Xử lý khi chọn ngày sinh của trẻ
    $('#birthdate_picker').datetimepicker({
        format: DATE_FORMAT,
        defaultDate: new Date()
    });

    //Xử lý khi chọn ngày dự sinh của thai nhi
    $('#due_date_of_childbearing_picker').datetimepicker({
        format: DATE_FORMAT,
        defaultDate: new Date()
    });

    //Xử lý khi chọn ngày bắt đầu đơn thuốc
    $('#medicine_begin_picker').datetimepicker({
        format: DATE_FORMAT,
        defaultDate: new Date()
    });

    //Xử lý khi chọn ngày kết thúc đơn thuốc
    $('#medicine_end_picker').datetimepicker({
        format: DATE_FORMAT,
        defaultDate: new Date()
    });
    //Xử lý khi chọn ngày dự sinh của trẻ
    $('#due_date_picker').datetimepicker({
        format: DATE_FORMAT
    });

    /**
     * Tìm kiếm user khi nhập vào ô text
     */
    $('body').on('keyup', '#search-parent', search_delay(function () {
        var query = $(this).val();
        if (query.length < 4) return;

        var user_ids = new Array();
        $("input[name*='user_id']").each(function () {
            user_ids.push($(this).val());
        });

        if (!is_empty(query)) {
            $('#search-parent-results').show();
            $.post(api['school/search'], {'query': query, 'user_ids': user_ids, 'func': 'parent'}, function (response) {
                if (response.callback) {
                    eval(response.callback);
                } else if (response.results) {
                    $('#search-parent-results .dropdown-widget-header').show();
                    $('#search-parent-results .dropdown-widget-body').html(response.results);
                } else {
                    $('#search-parent-results .dropdown-widget-header').hide();
                    $('#search-parent-results .dropdown-widget-body').html(render_template('#search-for', {'query': query}));
                }
            }, 'json');
        }
    }, 1000));

    /* show previous search-parent-results when the search-parent is clicked */
    $('body').on('click', '#search-parent', function () {
        if ($(this).val() != '') {
            $('#search-parent-results').show();
        }
    });

    /**
     * Hàm xử lý khi chọn user từ danh sách xổ ra
     */
    $('body').on('click', '.js_parent-select', function () {
        var user_id = $(this).attr('data-uid');
        var user_ids = new Array();
        $("input[name*='user_id']").each(function () {
            user_ids.push($(this).val());
        });

        $.post(api['school/parentlist'], {
            'user_id': user_id,
            'user_ids': user_ids,
            'func': 'add'
        }, function (response) {
            if (response.results) {
                $('#parent_list').html(response.results);
                if ($('#parent_phone').val() == '') {
                    $('#parent_phone').val(response.phone);
                }
                if ($('#parent_email').val() == '') {
                    $('#parent_email').val(response.email);
                }
                $('#create_parent_account').prop('checked', response.no_parent);
                $('#create_parent_account').prop('disabled', !response.no_parent);
                // $('#parent_name').prop('disabled', !response.no_parent);
            }
        }, 'json');
    });

    $('body').on('click', '.js_parent-remove', function () {
        var user_id = $(this).attr('data-uid');
        var user_ids = new Array();
        $("input[name*='user_id']").each(function () {
            user_ids.push($(this).val());
        });
        $.post(api['school/parentlist'], {
            'user_id': user_id,
            'user_ids': user_ids,
            'func': 'remove'
        }, function (response) {
            if (response.results) {
                $('#parent_list').html(response.results);
                if ($('#parent_phone').val() == '') {
                    $('#parent_phone').val(response.phone);
                }
                if ($('#parent_email').val() == '') {
                    $('#parent_email').val(response.email);
                }
                $('#create_parent_account').prop('checked', response.no_parent);
                $('#create_parent_account').prop('disabled', !response.no_parent);
                $('#parent_name').prop('disabled', !response.no_parent);
            }
        }, 'json');
    });
    //END - Màn hình: Thêm user có sẳn làm cha mẹ của một trẻ ----------------------------------------------------------

    //Xóa dữ liệu trên màn hình tạo trẻ
    $('body').on('click', '.js_add_child_clear', function () {
        $("input[name*='nickname']").val("");
        $("input[name*='due_date_of_childbearing']").val("");
        $("input[name*='child_code']").val("");
        $("input[name*='last_name']").val("");
        $("input[name*='first_name']").val("");
        $("input[name*='birthday']").val("");
        $("input[name*='search-parent']").val("");
        $('#parent_list').html("");
        $("input[name*='parent_phone']").val("");
        $("input[name*='parent_email']").val("");
        $('#create_parent_account').prop('checked', true);
        $('#create_parent_account').prop('disabled', false);
        $("input[name*='address']").val("");
        $("input[name*='begin_at']").val("");
        $("#description").val("");
        $("#pregnant_week").val("");
    });

    /* hide the contro when clicked outside control */
    $('body').on('click', function (e) {
        /* hide the search-username-results when clicked outside search-username */
        if (!$(e.target).is("#search-username")) {
            $('#search-username-results').hide();
        }
        /* hide the search-teacher-results when clicked outside search-teacher */
        if (!$(e.target).is("#search-teacher")) {
            $('#search-teacher-results').hide();
        }

        if (!$(e.target).is("#search-parent")) {
            $('#search-parent-results').hide();
        }
    });

    /* CI - Định dạng số đến hàng nghìn (ví dụ: 200,000) */
    $('body').on('keyup', '#number_commas', function () {
        this.value = parseFloat(this.value.replace(/,/g, ""))
            .toFixed(0)
            .toString()
            .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    });

    // Xử lý khi ấn chọn biểu đồ
    $('body').on('click', '.js_hight-chart-show', function () {
        $(".js_weight-chart-show").css('background', '#ECECEC');
        $(".js_hight-chart-show").css('background', '#0CC4C3');
        $(".js_bmi-chart-show").css('background', '#ECECEC');
        $("#hight_chart").show();
        $("#bmi_chart").hide();
        $("#weight_chart").hide();

    });

    $('body').on('click', '.js_weight-chart-show', function () {
        $(".js_weight-chart-show").css('background', '#0CC4C3');
        $(".js_hight-chart-show").css('background', '#ECECEC');
        $(".js_bmi-chart-show").css('background', '#ECECEC');
        $("#hight_chart").hide();
        $("#bmi_chart").hide();
        $("#weight_chart").show();

    });

    $('body').on('click', '.js_bmi-chart-show', function () {
        $(".js_weight-chart-show").css('background', '#ECECEC');
        $(".js_hight-chart-show").css('background', '#ECECEC');
        $(".js_bmi-chart-show").css('background', '#0CC4C3');
        $("#hight_chart").hide();
        $("#bmi_chart").show();
        $("#weight_chart").hide();
    });

    $('#begin_chart_picker').datetimepicker({
        format: DATE_FORMAT,
        defaultDate: new Date()
    });

    $('#end_chart_picker').datetimepicker({
        format: DATE_FORMAT,
        defaultDate: new Date()
    });
    $("#begin_chart_picker").on("dp.change", function (e) {
        $('#end_chart_picker').data("DateTimePicker").minDate(e.date);
    });

    //xử lý check all
    $('body').on('change', '#check_checkall', function () {
        $(".check_element").prop('checked', $(this).prop("checked"));
    });

    // Xử lý khi ấn chọn tab trong quá trình phát triển
    $('body').on('click', '.js_general-show', function () {
        $(".js_missed-show").css('background', '#ECECEC');
        $(".js_general-show").css('background', '#0CC4C3');
        $(".js_vaccinating-show").css('background', '#ECECEC');
        $("#general").show();
        $("#missed").hide();
        $("#vaccinating").hide();

    });

    $('body').on('click', '.js_missed-show', function () {
        $(".js_missed-show").css('background', '#0CC4C3');
        $(".js_general-show").css('background', '#ECECEC');
        $(".js_vaccinating-show").css('background', '#ECECEC');
        $("#general").hide();
        $("#vaccinating").hide();
        $("#missed").show();

    });

    $('body').on('click', '.js_vaccinating-show', function () {
        $(".js_missed-show").css('background', '#ECECEC');
        $(".js_general-show").css('background', '#ECECEC');
        $(".js_vaccinating-show").css('background', '#0CC4C3');
        $("#general").hide();
        $("#vaccinating").show();
        $("#missed").hide();
    });
    $(document).on('ready', function () {
        var height = $('#myCarousel').height();
        $('.phone_img_box').height(height);
        $('.phone_img').height(height);

        var img_height = $('.news_img_box').height();
        $('.img_mark').height(img_height);

        $(".news_img_box").each(function(e){
            $('.news_img_box').height(img_height);
        });
        var content_height = $('.news_content_box').height();
        $(".news_content_box").each(function(e){
            $('.news_content_box').height(content_height);
        });
        var title_height = $('.news_title').height();
        $(".news_title").each(function(e){
            $('.news_title').height(title_height);
        });
    });

    $('body').on('click', '.play_video_button', function () {
        $('.box-video').show();
        $('.login_overlay').show();
        var video = $(".myVideo").attr("src");
        var video_auto = video.replace('autoplay=0', 'autoplay=1');
        $(".myVideo").attr("src",video_auto);
    });
    $('body').on('click', '.register_close', function () {
        $('.box-video').hide();
        $('.login_overlay').hide();
        var video = $(".myVideo").attr("src");
        var video_not_auto = video.replace('autoplay=1', 'autoplay=0');
        $(".myVideo").attr("src","");
        $(".myVideo").attr("src",video_not_auto);
    });

    $('body').on('click', '.js_free-trial', function () {
        $('.box_reg_school').show();
        $('.login_overlay').show();
    });
    $('body').on('click', '.register_school_close', function () {
        $('.box_reg_school').hide();
        $('.login_overlay').hide();
    });

    // Hàm bỏ overflow hidden banner
    $(document).ready(function () {
        setTimeout(function(){
            $('.banner_img').css('overflow', 'unset');
        }, 3000);
    });

    // xử lý khi click vào ẩn popup down app
    $('body').on('click touch', '.down_app_hide', function () {
        $('.app_down_box').hide();
        var cookie_status = 0;
        var user_id = $(this).attr('data-id');

        var name = "download_ap_" + user_id;

        createCookie(name, cookie_status);
    });

    // xử lý khi click vào ẩn popup down app
    $('body').on('click touch', '.down_app_hide_home', function () {
        $('.app_down_box').hide();
        // var cookie_status = 0;
        //
        // var name = "download_app";
        //
        // createCookie(name, cookie_status);
    });

    $('body').on('click', '.js_event_toggle', function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        $('.event_description_' + id).toggle();
    });

    $('#select_object').on('change', function () {
        var object = this.value;
        var type = $('#select_object option:selected').attr('data-type');

        // Show loading
        $("#loading_full_screen").removeClass('hidden');

        $.post(api['school/search'], {'func': 'change_object', 'object': object, 'type': type}, function (response) {
            // Hidden loading
            $("#loading_full_screen").addClass('hidden');

            if (response.callback) {
                eval(response.callback);
            } else if(response.error) {
                modal('#modal-error', {title: __['Error'], message: response.message});
            } else {
                window.location.reload();
            }
        }, 'json')
            .fail(function () {
                // Hidden loading
                $("#loading_full_screen").addClass('hidden');

                modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
            });
    });

    $('body').on('click', '#chat_on_off', function (e) {
        var _this = $(this);
        var session_user_chat = _this.attr('data-value');

        // Show loading
        $("#loading_full_screen").removeClass('hidden');

        $.post(api['core/session'], {'func': 'change_session', 'session_user_chat': session_user_chat}, function (response) {
            // Hidden loading
            $("#loading_full_screen").addClass('hidden');

            if (response.callback) {
                eval(response.callback);
            } else if(response.error) {
                modal('#modal-error', {title: __['Error'], message: response.message});
            } else {
                window.location.reload();
            }
        }, 'json')
            .fail(function () {
                // Hidden loading
                $("#loading_full_screen").addClass('hidden');

                modal('#modal-message', {title: __['Error'], message: __['There is something that went wrong!']});
            });
    });
});