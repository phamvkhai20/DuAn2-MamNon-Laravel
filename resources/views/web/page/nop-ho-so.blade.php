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
                <form class="m-form m-form--label-align-left- m-form--state-" id="m_form">
                    <div class="m-portlet__body">
                        <div class="m-wizard__form-step m-wizard__form-step--current" id="m_wizard_form_step_1">
                            <div class="row">
                                <div class="col-xl-8 offset-xl-2">
                                    <div class="m-form__section m-form__section--first">

                                        <div class="form-group m-form__group row">
                                            <label class="col-xl-3 col-lg-3 ">* Họ và tên trẻ:</label>
                                            <div class="col-xl-9 col-lg-9">
                                                <input type="text" name="name_kid" class="form-control m-input">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label class="col-xl-3 col-lg-3 l">* Ngày sinh:</label>
                                            <div class="col-xl-9 col-lg-9">
                                                <input type="date" name="birthday" class="form-control m-input">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label class="col-xl-3 col-lg-3 ">* Giới tính</label>
                                            <div class="col-xl-9 col-lg-9">
                                                <label class="m-radio m-radio--solid m-radio--brand ml-3">
                                                    <input type="radio" name="sex" value="1"> Nam
                                                    <span></span>
                                                </label>
                                                <label class="m-radio m-radio--solid m-radio--brand ml-3">
                                                    <input type="radio" name="sex" value="2"> Nữ
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">* Hộ khẩu thường trú</label>
                                            <div class="col-xl-9 col-lg-9">
                                                <div class="input-group">
                                                    <input type="text" name="address1" class="form-control m-input"
                                                        placeholder="">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">* Hiện đang cư chú
                                                tại</label>
                                            <div class="col-xl-9 col-lg-9">
                                                <div class="input-group">
                                                    <input type="text" name="address2" class="form-control m-input"
                                                        placeholder="">
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
                                        <div class="m-form__heading">
                                            <h3 class="m-form__heading-title">Thông tin bố</h3>
                                        </div>
                                        <div class="form-group m-form__group ">
                                            <div class="row">
                                                <div class="col-lg-6 m-form__group-sub">
                                                    <label class="form-control-label">* Họ và tên:</label>
                                                    <input type="text" name="full_name_father"
                                                        class="form-control m-input" placeholder="">
                                                </div>
                                                <div class="col-lg-6 m-form__group-sub">
                                                    <label class="form-control-label">* Điện thoại:</label>
                                                    <input type="tel" name="number_phone_father"
                                                        class="form-control m-input" placeholder="">
                                                </div>
                                            </div>
                                            <div class="row mt-5">
                                                <div class="col-lg-6 m-form__group-sub">
                                                    <label class="form-control-label">* Nghề nghiệp:</label>
                                                    <input type="text" name="job_father" class="form-control m-input"
                                                        placeholder="">
                                                </div>
                                                <div class="col-lg-6 m-form__group-sub">
                                                    <label class="form-control-label">* Nơi công tác:</label>
                                                    <input type="text" name="work_plance_father"
                                                        class="form-control m-input" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                        <div class="m-form__heading">
                                            <h3 class="m-form__heading-title">Thông tin mẹ</h3>
                                        </div>
                                        <div class="form-group m-form__group">
                                            <div class="row">
                                                <div class="col-lg-6 m-form__group-sub">
                                                    <label class="form-control-label">* Họ và tên:</label>
                                                    <input type="text" name="full_name_mother"
                                                        class="form-control m-input" placeholder="">
                                                </div>
                                                <div class="col-lg-6 m-form__group-sub">
                                                    <label class="form-control-label">* Điện thoại:</label>
                                                    <input type="tel" name="number_phone_mother"
                                                        class="form-control m-input" placeholder="">
                                                </div>
                                            </div>
                                            <div class="row mt-5">
                                                <div class="col-lg-6 m-form__group-sub">
                                                    <label class="form-control-label">* Nghề nghiệp:</label>
                                                    <input type="text" name="job_mother" class="form-control m-input"
                                                        placeholder="">
                                                </div>
                                                <div class="col-lg-6 m-form__group-sub">
                                                    <label class="form-control-label">* Nơi công tác:</label>
                                                    <input type="text" name="work_plance_mother"
                                                        class="form-control m-input" placeholder="">
                                                </div>
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
                                                            name="name_kid_text"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Ngày sinh:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static"
                                                            name="birthday_text"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Giới tính:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static" name="sex_text"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Hộ khẩu thường
                                                        trú:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static"
                                                            name="address1_text"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Hiện đang cư chú
                                                        tại:
                                                        trú:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static"
                                                            name="address2_text"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                            <div class="tab-pane" id="m_form_confirm_2" role="tabpanel">
                                                <div class="m-form__section m-form__section--first">
                                                    <div class="m-form__heading">
                                                        <h4 class="m-form__heading-title">Thông tin bố</h4>
                                                    </div>
                                                    <div class="form-group m-form__group m-form__group--sm row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Họ và
                                                            tên:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <span class="m-form__control-static"
                                                                name="full_name_father_text"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group m-form__group--sm row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Điện
                                                            thoại:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <span class="m-form__control-static"
                                                                name="number_phone_father_text"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group m-form__group--sm row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Nghề
                                                            nghiệp:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <span class="m-form__control-static"
                                                                name="job_father_text"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group m-form__group--sm row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Nơi công
                                                            tác:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <span class="m-form__control-static"
                                                                name="work_plance_father_text"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                                <div class="m-form__section m-form__section--first">
                                                    <div class="m-form__heading">
                                                        <h4 class="m-form__heading-title">Thông tin mẹ</h4>
                                                    </div>
                                                    <div class="form-group m-form__group m-form__group--sm row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Họ và
                                                            tên:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <span class="m-form__control-static"
                                                                name="full_name_mother_text"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group m-form__group--sm row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Điện
                                                            thoại:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <span class="m-form__control-static"
                                                                name="number_phone_mother_text"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group m-form__group--sm row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Nghề
                                                            nghiệp:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <span class="m-form__control-static"
                                                                name="job_mother_text"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group m-form__group--sm row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Nơi công
                                                            tác:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <span class="m-form__control-static"
                                                                name="work_plance_mother_text"></span>
                                                        </div>
                                                    </div>
                                                </div>
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
                                    <a href="#" onclick="fillData1()"
                                        class="btn btn-warning m-btn m-btn--custom m-btn--icon"
                                        data-wizard-action="next">
                                        <span>
                                            <span>Lưu & Tiếp tục</span>&nbsp;&nbsp;
                                            <i class="la la-arrow-right"></i>
                                        </span>
                                    </a>
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
function fillData1() {
    var name_kid = document.querySelector("input[name = 'name_kid']").value;
    var address1 = document.querySelector("input[name = 'address1']").value;
    var address2 = document.querySelector("input[name = 'address2']").value;
    var birthday = document.querySelector("input[name = 'birthday']").value;
    var sex = document.querySelector("input[name = 'sex']").value;
    var full_name_father = document.querySelector("input[name = 'full_name_father']").value;
    var number_phone_father = document.querySelector("input[name = 'number_phone_father']").value;
    var job_father = document.querySelector("input[name = 'job_father']").value;
    var work_plance_father = document.querySelector("input[name = 'work_plance_father']").value;
    var full_name_mother = document.querySelector("input[name = 'full_name_mother']").value;
    var number_phone_mother = document.querySelector("input[name = 'number_phone_mother']").value;
    var job_mother = document.querySelector("input[name = 'job_mother']").value;
    var work_plance_mother = document.querySelector("input[name = 'work_plance_mother']").value;

    const name_kid_text = document.querySelector("span[name = 'name_kid_text']");
    const address1_text = document.querySelector("span[name = 'address1_text']");
    const address2_text = document.querySelector("span[name = 'address2_text']");
    const birthday_text = document.querySelector("span[name = 'birthday_text']");
    const sex_text = document.querySelector("span[name = 'sex_text']");
    const full_name_father_text = document.querySelector("span[name = 'full_name_father_text']");
    const number_phone_father_text = document.querySelector("span[name = 'number_phone_father_text']");
    const job_father_text = document.querySelector("span[name = 'job_father_text']");
    const work_plance_father_text = document.querySelector("span[name = 'work_plance_father_text']");
    const full_name_mother_text = document.querySelector("span[name = 'full_name_mother_text']");
    const number_phone_mother_text = document.querySelector("span[name = 'number_phone_mother_text']");
    const job_mother_text = document.querySelector("span[name = 'job_mother_text']");
    const work_plance_mother_text = document.querySelector("span[name = 'work_plance_mother_text']");

    name_kid_text.innerHTML = name_kid;
    address1_text.innerHTML = address1;
    address2_text.innerHTML = address2;
    birthday_text.innerHTML = birthday;
    sex_text.innerHTML = sex == 1 ? "Nam" : "Nữ";
    full_name_father_text.innerHTML = full_name_father;
    number_phone_father_text.innerHTML = number_phone_father;
    job_father_text.innerHTML = job_father;
    work_plance_father_text.innerHTML = work_plance_father;
    full_name_mother_text.innerHTML = full_name_mother;
    number_phone_mother_text.innerHTML = number_phone_mother;
    job_mother_text.innerHTML = job_mother;
    work_plance_mother_text.innerHTML = work_plance_mother;

}

function myFunction() {
    event.preventDefault();

    var name_kid = document.querySelector("input[name = 'name_kid']").value;
    var address1 = document.querySelector("input[name = 'address1']").value;
    var address2 = document.querySelector("input[name = 'address2']").value;
    var birthday = document.querySelector("input[name = 'birthday']").value;
    var sex = document.querySelector("input[name = 'sex']").value;
    var full_name_father = document.querySelector("input[name = 'full_name_father']").value;
    var number_phone_father = document.querySelector("input[name = 'number_phone_father']").value;
    var job_father = document.querySelector("input[name = 'job_father']").value;
    var work_plance_father = document.querySelector("input[name = 'work_plance_father']").value;
    var full_name_mother = document.querySelector("input[name = 'full_name_mother']").value;
    var number_phone_mother = document.querySelector("input[name = 'number_phone_mother']").value;
    var job_mother = document.querySelector("input[name = 'job_mother']").value;
    var work_plance_mother = document.querySelector("input[name = 'work_plance_mother']").value;

    const data = {
        name_kid: name_kid,
        address1: address1,
        address2: address2,
        birthday: birthday,
        sex: sex,
        full_name_father: full_name_father,
        number_phone_father: number_phone_father,
        job_father: job_father,
        work_plance_father: work_plance_father,
        full_name_mother: full_name_mother,
        number_phone_mother: number_phone_mother,
        job_mother: job_mother,
        work_plance_mother: work_plance_mother
    }
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
                    "timer" === e.dismiss &&
                        window.location.reload();
                });
            }
        }).catch((error) => {
            swal("Gửi thất bại!", "Vui lòng kiểm tra lại thông tin nhập", "Lỗi");
        });



    });

}
</script>
@endsection