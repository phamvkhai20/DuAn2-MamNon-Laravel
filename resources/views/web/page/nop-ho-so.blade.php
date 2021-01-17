    @extends('./web/login/layouts/layout')
    @section('title','Nộp hồ sơ nhập học')
    @section('content')

    <div class="m-content">
        <div style="height: 45px;">
        </div>
        <div class="m-portlet m-portlet--full-height mt-5">
            <!--begin: Portlet Head-->
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Đơn xin nhập học mầm non - Trường Mầm Non Tuổi Ngọc - Năm học 2020 - 2021
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                </div>
            </div>
            <div class="m-wizard m-wizard--2 m-wizard--success" id="m_wizard">
                <div class="m-portlet__padding-x">
                </div>
                <div class="m-wizard__head m-portlet__padding-x">
                    <div class="m-wizard__progress">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="m-wizard__nav">
                        <div class="m-wizard__steps">
                            <div class="m-wizard__step m-wizard__step--current" m-wizard-target="m_wizard_form_step_1">
                                <a href="#" class="m-wizard__step-number">
                                    <span><i class="fa  flaticon-placeholder"></i></span>
                                </a>
                                <div class="m-wizard__step-info">
                                    <div class="m-wizard__step-title">
                                        1. Điền thông tin trẻ
                                    </div>

                                </div>
                            </div>
                            <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_2">
                                <a href="#" class="m-wizard__step-number">
                                    <span><i class="fa  flaticon-layers"></i></span>
                                </a>
                                <div class="m-wizard__step-info">
                                    <div class="m-wizard__step-title">
                                        2. Điền thông tin phụ huynh
                                    </div>

                                </div>
                            </div>
                            <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_3">
                                <a href="#" class="m-wizard__step-number">
                                    <span><i class="fa  flaticon-layers"></i></span>
                                </a>
                                <div class="m-wizard__step-info">
                                    <div class="m-wizard__step-title">
                                        3. Kiểm tra lại thông tin
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-wizard__form">
                    <form class="m-form m-form--label-align-left- m-form--state-" id="m_form" method="post" >
                        <div class="m-portlet__body">
                            <div class="m-wizard__form-step m-wizard__form-step--current" id="m_wizard_form_step_1">
                                <div class="row">
                                    <div class="col-xl-8 offset-xl-2">
                                        <div class="m-form__section m-form__section--first">

                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-3 col-lg-3 ">* Họ và tên trẻ:</label><p  id="name_kid"></p>
                                                <div class="col-xl-9 col-lg-9">
                                                    <input type="text" name="kid_name" class="form-control m-input" onchange="show()">
                                                    <P id="id_kid_name"></P>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-3 col-lg-3 ">* Tên gọi ở nhà</label>
                                                <div class="col-xl-9 col-lg-9">
                                                    <input type="text" name="nickname" class="form-control m-input" onchange="show()">
                                                    <P id="id_nick_name"></P>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-3 col-lg-3 l">* Ngày sinh:</label>
                                                <div class="col-xl-9 col-lg-9">
                                                    <input type="date" name="date_of_birth" class="form-control m-input" onchange="show()" value="">
                                                    <P id="id_date"></P>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-3 col-lg-3 ">* Giới tính</label>
                                                <div class="col-xl-9 col-lg-9">
                                                    <label class="m-radio m-radio--solid m-radio--brand ml-3">
                                                        <input type="radio" name="gender" checked value="1"> Nam
                                                        <span></span>
                                                    </label>
                                                    <label class="m-radio m-radio--solid m-radio--brand ml-3">
                                                        <input type="radio" name="gender" value="0"> Nữ
                                                        <span></span>
                                                    </label>
                                                    <P id="id_gerder"></P>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">* Hiện đang cư trú tại</label>
                                                <div class="col-xl-9 col-lg-9">
                                                    <div class="input-group">
                                                        <input type="text" name="address" class="form-control m-input"
                                                            placeholder="" onchange="show()">
                                                            <P id="id_address"></P>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">* Lứa tuổi</label>
                                                <div class="col-xl-9 col-lg-9">
                                                    <div class="input-group">
                                                        <select  class="form-control m-input" name="grade_id" id="grade" onchange="show()">
                                                            <option value="0">Chọn lứa tuổi</option>
                                                            @foreach ($grades as $grade)
                                                            <option value="{{$grade->id}}">{{$grade->grade}}</option>
                                                            @endforeach
                                                        </select>
                                                        <p id="gr"></p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="m-wizard__form-step" id="m_wizard_form_step_2">
                                <div class="row">
                                    <div class="col-xl-8 offset-xl-2">
                                        <div class="m-form__section m-form__section--first">

                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-3 col-lg-3 ">* Họ và tên phụ huynh:</label>
                                                <div class="col-xl-9 col-lg-9">
                                                    <input type="text" name="parent_name" class="form-control m-input">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-3 col-lg-3 ">* Số điện thoại:</label>
                                                <div class="col-xl-9 col-lg-9">
                                                    <input type="text" name="phone" class="form-control m-input">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-3 col-lg-3 l">* Email:</label>
                                                <div class="col-xl-9 col-lg-9">
                                                    <input type="text" name="email" class="form-control m-input" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end: Form Wizard Step 2-->

                            <!--begin: Form Wizard Step 3-->
                            <div class="m-wizard__form-step" id="m_wizard_form_step_3">
                                <div class="row">
                                    <div class="col-xl-8 offset-xl-2">

                                        <!--begin::Section-->
                                        <ul class="nav nav-tabs m-tabs-line--2x m-tabs-line m-tabs-line--danger"
                                            role="tablist">
                                            <li class="nav-item m-tabs__item">
                                                <a class="nav-link m-tabs__link active" data-toggle="tab"
                                                    href="#m_form_confirm_1" role="tab">1. Thông tin trẻ</a>
                                            </li>
                                            <li class="nav-item m-tabs__item">
                                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_form_confirm_2"
                                                    role="tab">2. Thông tin phụ huynh</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content m--margin-top-40">
                                            <div class="tab-pane active" id="m_form_confirm_1" role="tabpanel">
                                                <div class="m-form__section m-form__section--first">
                                                    <div class="m-form__heading">
                                                        <h4 class="m-form__heading-title">Thông trẻ</h4>
                                                    </div>
                                                    <div class="form-group m-form__group m-form__group--sm row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Họ và tên
                                                            trẻ:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <span class="m-form__control-static"
                                                                name="kid_name_text"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group m-form__group--sm row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Tên gọi ở nhà:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <span class="m-form__control-static"
                                                                name="nickname_text"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group m-form__group--sm row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Ngày sinh:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <span class="m-form__control-static"
                                                                name="date_of_birth_text"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group m-form__group--sm row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Giới tính:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <span class="m-form__control-static" name="gender_text"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group m-form__group--sm row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Hiện đang cư trú tại:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <span class="m-form__control-static"
                                                                name="address_text"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group m-form__group--sm row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Lứa tuổi</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <span class="m-form__control-static"
                                                                name="grade_id_text"></span>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                                <div class="tab-pane" id="m_form_confirm_2" role="tabpanel">
                                                    <div class="m-form__section m-form__section--first">
                                                        <div class="m-form__heading">
                                                            <h4 class="m-form__heading-title">Thông tin phụ huynh</h4>
                                                        </div>
                                                        <div class="form-group m-form__group m-form__group--sm row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Họ và
                                                                tên phụ huynh:</label>
                                                            <div class="col-xl-9 col-lg-9">
                                                                <span class="m-form__control-static"
                                                                    name="parent_name_text"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group m-form__group m-form__group--sm row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Số điện
                                                                thoại:</label>
                                                            <div class="col-xl-9 col-lg-9">
                                                                <span class="m-form__control-static"
                                                                    name="phone_text"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group m-form__group m-form__group--sm row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Email:</label>
                                                            <div class="col-xl-9 col-lg-9">
                                                                <span class="m-form__control-static"
                                                                    name="email_text"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="m-separator m-separator--dashed m-separator--lg"></div>

                                                </div>
                                            </div>

                                        </div>

                                        <!--end::Section-->

                                        <!--end::Section-->
                                        <div class="m-separator m-separator--dashed m-separator--lg"></div>

                                    </div>
                                </div>
                            </div>

                            <!--end: Form Wizard Step 3-->
                        </div>

                        <!--end: Form Body -->

                        <!--begin: Form Actions -->
                        <div class="m-portlet__foot m-portlet__foot--fit m--margin-top-40">
                            <div class="m-form__actions">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-4 m--align-left">
                                    <a href="#" class="btn btn-secondary m-btn m-btn--custom m-btn--icon"
                                            data-wizard-action="prev">
                                            <span>
                                                <i class="la la-arrow-left"></i>
                                                <span>Back</span>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 m--align-right">
                                        <button type="submit" href="#"
                                            class="btn btn-primary m-btn m-btn--custom m-btn--icon"
                                            data-wizard-action="submit" name="submit" onclick=" myFunction() ">
                                            <span>
                                                <i class="la la-check"></i>&nbsp;&nbsp;
                                                <span>Gửi</span>
                                            </span>
                                        </button>

                                        <button href="#" onclick="fillData1()"
                                            class="btn btn-warning m-btn m-btn--custom m-btn--icon"
                                            data-wizard-action="next"id="aas">
                                            <span>
                                                <span>Lưu & Tiếp tục</span>&nbsp;&nbsp;
                                                <i class="la la-arrow-right"></i>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="col-lg-2"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector("#aas").disabled = true;
        function show(){
            document.querySelector("#id_nick_name").innerHTML="";
            document.querySelector("#id_kid_name").innerHTML="";
            document.querySelector("#id_address").innerHTML="";
          var kid_name = document.querySelector("input[name = 'kid_name']");
          var nickname = document.querySelector("input[name = 'nickname']");
          var address = document.querySelector("input[name = 'address']");
          var date_of_birth = document.querySelector("input[name = 'date_of_birth']").value;
            var grade = document.querySelector("#grade").value;

            var ass = document.querySelector("#aas");
            var date= new Date();
            console.log(date.getFullYear());


        var tuoi=parseInt(date_of_birth.slice(0, 4));
          console.log("tuoi"+tuoi);
        var nam=parseInt(date.getFullYear());
        var nam_max=nam-3;
        console.log(nam_max);

    var nam_min=nam-6;
    console.log(nam_min);
    if (kid_name.value== "") {
        kid_name.style.backgroundColor='#FFE591';
        document.querySelector("#id_kid_name").innerHTML="Không được bỏ trống tên";
            }
             if(nickname.value ==""){
                 nickname.style.backgroundColor='#FFE591';
                 document.querySelector("#id_nick_name").innerHTML="Không được bỏ trống tên ở nhà";
            }
             if(date_of_birth   ==""){
                date_of_birth.style.backgroundColor='#FFE591';
                document.querySelector("#id_date").innerHTML="không được bỏ trống ngày sinh";
            }
             if(tuoi<nam_min||tuoi>nam_max){
                date_of_birth.style.backgroundColor='#FFE591';
                document.querySelector("#id_date").innerHTML="Năm tuổi k phù hợp";
            }
             if(address.value ==""){
                address.style.backgroundColor='#FFE591';
                document.querySelector("#id_address").innerHTML="Không được để trống địa chỉ";
            }
             if(grade =="0"){
                 alert("Chọn lứa tuổi của trẻ");
                        // document.querySelector("#id_address").innerHTML="không được để trống địa chỉ";
            }
            else{
                document.querySelector("#aas").disabled = false;
                }
        }

    function fillData1() {
        var kid_name = document.querySelector("input[name = 'kid_name']").value;
        var nickname = document.querySelector("input[name = 'nickname']").value;
        var address = document.querySelector("input[name = 'address']").value;
        var date_of_birth = document.querySelector("input[name = 'date_of_birth']").value;
        var gender = document.querySelector("input[name = 'gender']").value;
        var grade = $( "#grade option:selected" ).text();
        var parent_name = document.querySelector("input[name = 'parent_name']").value;
        var email = document.querySelector("input[name = 'email']").value;
        var phone = document.querySelector("input[name = 'phone']").value;
        const kid_name_text = document.querySelector("span[name = 'kid_name_text']");
        const nickname_text = document.querySelector("span[name = 'nickname_text']");
        const address_text = document.querySelector("span[name = 'address_text']");
        const date_of_birth_text = document.querySelector("span[name = 'date_of_birth_text']");
        const gender_text = document.querySelector("span[name = 'gender_text']");
        const grade_id_text = document.querySelector("span[name = 'grade_id_text']");
        const parent_name_text = document.querySelector("span[name = 'parent_name_text']");
        const phone_text = document.querySelector("span[name = 'phone_text']");
        const email_text = document.querySelector("span[name = 'email_text']");

        kid_name_text.innerHTML = kid_name;
        nickname_text.innerHTML = nickname;
        address_text.innerHTML = address;
        date_of_birth_text.innerHTML = date_of_birth;
        grade_id_text.innerHTML = grade;
        gender_text.innerHTML = gender == 1 ? "Nam" : "Nữ";
        parent_name_text.innerHTML = parent_name;
        phone_text.innerHTML = phone;
        email_text.innerHTML = email;



    }
    function myFunction() {
        event.preventDefault();
        var kid_name = document.querySelector("input[name = 'kid_name']").value;
        var nickname = document.querySelector("input[name = 'nickname']").value;
        var address = document.querySelector("input[name = 'address']").value;
        var date_of_birth = document.querySelector("input[name = 'date_of_birth']").value;
        var gender = document.querySelector("input[name = 'gender']").value;
        var grade_id = $( "#grade option:selected" ).val();
        var parent_name = document.querySelector("input[name = 'parent_name']").value;
        var email = document.querySelector("input[name = 'email']").value;
        var phone = document.querySelector("input[name = 'phone']").value;
        var status = '0';
        const data = {
            kid_name: kid_name,
            nickname: nickname,
            address: address,
            date_of_birth: date_of_birth,
            gender: gender,
            grade_id: grade_id,
            parent_name: parent_name,
            email: email,
            phone: phone,
            status:status
        }
        console.log(data);
        swal({
            title: "Bạn có chắc chắn gửi",
            text: "Thông tin của bạn sẽ được gửi đến trường mầm non Tuổi Ngọc!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Nộp",
            cancelButtonText: "Thôi",
            reverseButtons: !0,
        }).then(function(e) {
            e.value && axios.post("{{ route('web.ho-so-nhap-hoc')}}", data).then((response) => {
                if (response.status === 200) {
                    swal({
                        title: "Nộp đơn xin nhập học thành công !",
                        text: "Thông báo tự động đóng trong 5s.",
                        timer: 5e3,
                        onOpen: function() {
                            swal.showLoading();
                        },
                    }).then(function(e) {
                        // "timer" === e.dismiss &&
                            // window.location.reload();
                    });
                }
            }).catch((error) => {
                swal("Gửi thất bại!", "Vui lòng kiểm tra lại thông tin nhập", "Lỗi");
            });
        });
    }



    </script>
    @endsection
