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

        <!--end: Portlet Head-->

        <!--begin: Form Wizard-->
        <div class="m-wizard m-wizard--2 m-wizard--success" id="m_wizard">

            <!--begin: Message container -->
            <div class="m-portlet__padding-x">

                <!-- Here you can put a message or alert -->
            </div>

            <!--end: Message container -->

            <!--begin: Form Wizard Head -->
            <div class="m-wizard__head m-portlet__padding-x">

                <!--begin: Form Wizard Progress -->
                <div class="m-wizard__progress">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                </div>

                <!--end: Form Wizard Progress -->

                <!--begin: Form Wizard Nav -->
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

                <!--end: Form Wizard Nav -->
            </div>

            <!--end: Form Wizard Head -->

            <!--begin: Form Wizard Form-->
            <div class="m-wizard__form">


                <form class="m-form m-form--label-align-left- m-form--state-" id="m_form">

                    <!--begin: Form Body -->
                    <div class="m-portlet__body">

                        <!--begin: Form Wizard Step 1-->
                        <div class="m-wizard__form-step m-wizard__form-step--current" id="m_wizard_form_step_1">
                            <div class="row">
                                <div class="col-xl-8 offset-xl-2">
                                    <div class="m-form__section m-form__section--first">

                                        <div class="form-group m-form__group row">
                                            <label class="col-xl-3 col-lg-3 ">* Họ và tên trẻ:</label>
                                            <div class="col-xl-9 col-lg-9">
                                                <input type="text" name="names" class="form-control m-input">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label class="col-xl-3 col-lg-3 l">* Ngày sinh:</label>
                                            <div class="col-xl-9 col-lg-9">
                                                <input type="text" name="emails" class="form-control m-input">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label class="col-xl-3 col-lg-3 ">* Giới tính</label>
                                            <div class="col-xl-9 col-lg-9">
                                                <label class="m-radio m-radio--solid m-radio--brand">
                                                    <input type="radio" name="account_group" checked="" value="2"> Nam
                                                    <span></span>
                                                </label>
                                                <label class="m-radio m-radio--solid m-radio--brand ml-3">
                                                    <input type="radio" name="account_group" value="2"> Nữ
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">* Hộ khẩu thường trú</label>
                                            <div class="col-xl-9 col-lg-9">
                                                <div class="input-group">
                                                    <input type="text" name="emails" class="form-control m-input"
                                                        placeholder="">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">* Hiện đang cư chú
                                                tại</label>
                                            <div class="col-xl-9 col-lg-9">
                                                <div class="input-group">
                                                    <input type="text" name="emaisl" class="form-control m-input"
                                                        placeholder="">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--end: Form Wizard Step 1-->

                        <!--begin: Form Wizard Step 2-->
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
                                                    <input type="text" name="account_username"
                                                        class="form-control m-input" placeholder="" value="nick.stone">
                                                </div>
                                                <div class="col-lg-6 m-form__group-sub">
                                                    <label class="form-control-label">* Điện thoại:</label>
                                                    <input type="password" name="account_password"
                                                        class="form-control m-input" placeholder="" value="qwerty">
                                                </div>
                                            </div>
                                            <div class="row mt-5">
                                                <div class="col-lg-6 m-form__group-sub">
                                                    <label class="form-control-label">* Nghề nghiệp:</label>
                                                    <input type="text" name="account_username"
                                                        class="form-control m-input" placeholder="" value="nick.stone">
                                                </div>
                                                <div class="col-lg-6 m-form__group-sub">
                                                    <label class="form-control-label">* Nơi công tác:</label>
                                                    <input type="password" name="account_password"
                                                        class="form-control m-input" placeholder="" value="qwerty">
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
                                                    <input type="text" name="account_username"
                                                        class="form-control m-input" placeholder="" value="nick.stone">
                                                </div>
                                                <div class="col-lg-6 m-form__group-sub">
                                                    <label class="form-control-label">* Điện thoại:</label>
                                                    <input type="password" name="account_password"
                                                        class="form-control m-input" placeholder="" value="qwerty">
                                                </div>
                                            </div>
                                            <div class="row mt-5">
                                                <div class="col-lg-6 m-form__group-sub">
                                                    <label class="form-control-label">* Nghề nghiệp:</label>
                                                    <input type="text" name="account_username"
                                                        class="form-control m-input" placeholder="" value="nick.stone">
                                                </div>
                                                <div class="col-lg-6 m-form__group-sub">
                                                    <label class="form-control-label">* Nơi công tác:</label>
                                                    <input type="password" name="account_password"
                                                        class="form-control m-input" placeholder="" value="qwerty">
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
                                                href="#m_form_confirm_1" role="tab">1. Client Information</a>
                                        </li>
                                        <li class="nav-item m-tabs__item">
                                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_form_confirm_2"
                                                role="tab">2. Account Setup</a>
                                        </li>
                                        <li class="nav-item m-tabs__item">
                                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_form_confirm_3"
                                                role="tab">3. Billing Setup</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content m--margin-top-40">
                                        <div class="tab-pane active" id="m_form_confirm_1" role="tabpanel">
                                            <div class="m-form__section m-form__section--first">

                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Name:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">Nick Stone</span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Email:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">nick.stone@gmail.com</span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Phone</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">+206-78-55034890</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                            <div class="m-form__section">
                                                <div class="m-form__heading">
                                                    <h4 class="m-form__heading-title">Corresponding Address <i
                                                            data-toggle="m-tooltip" data-width="auto"
                                                            class="m-form__heading-help-icon flaticon-info"
                                                            title="Some help text goes here"></i></h4>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Address Line
                                                        1:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">Headquarters 1120 N Street
                                                            Sacramento 916-654-5266</span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Address Line
                                                        2:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">P.O. Box 942873 Sacramento,
                                                            CA 94273-0001</span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">City:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">Polo Alto</span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">State:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">California</span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Country:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">USA</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="m_form_confirm_2" role="tabpanel">
                                            <div class="m-form__section m-form__section--first">
                                                <div class="m-form__heading">
                                                    <h4 class="m-form__heading-title">Account Details</h4>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">URL:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span
                                                            class="m-form__control-static">sinortech.vertoffice.com</span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Username:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">sinortech.admin</span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Password:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">*********</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                            <div class="m-form__section">
                                                <div class="m-form__heading">
                                                    <h4 class="m-form__heading-title">Account Details</h4>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">URL:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span
                                                            class="m-form__control-static">sinortech.vertoffice.com</span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Username:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">sinortech.admin</span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Password:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">*********</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="m_form_confirm_3" role="tabpanel">
                                            <div class="m-form__section m-form__section--first">
                                                <div class="m-form__section">
                                                    <div class="m-form__heading">
                                                        <h4 class="m-form__heading-title">Client Settings</h4>
                                                    </div>
                                                    <div class="form-group m-form__group m-form__group--sm row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">User
                                                            Group:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <span class="m-form__control-static">Customer</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group m-form__group--sm row">
                                                        <label
                                                            class="col-xl-3 col-lg-3 col-form-label">Communications:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <span class="m-form__control-static">Phone, Email</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--end::Section-->

                                    <!--end::Section-->
                                    <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                    <div class="form-group m-form__group m-form__group--sm row">
                                        <div class="col-xl-12">
                                            <div class="m-checkbox-inline">
                                                <label class="m-checkbox m-checkbox--solid m-checkbox--brand">
                                                    <input type="checkbox" name="accept" value="1">
                                                    Click here to indicate that you have read and agree to the terms
                                                    presented in the Terms and Conditions agreement
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
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
                                    <a href="#" class="btn btn-primary m-btn m-btn--custom m-btn--icon"
                                        data-wizard-action="submit">
                                        <span>
                                            <i class="la la-check"></i>&nbsp;&nbsp;
                                            <span>Submit</span>
                                        </span>
                                    </a>
                                    <a href="#" class="btn btn-warning m-btn m-btn--custom m-btn--icon"
                                        data-wizard-action="next">
                                        <span>
                                            <span>Save & Continue</span>&nbsp;&nbsp;
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
<div id="m_quick_sidebar" class="m-quick-sidebar m-quick-sidebar--tabbed m-quick-sidebar--skin-light">
    <div class="m-quick-sidebar__content m--hide">
        <span id="m_quick_sidebar_close" class="m-quick-sidebar__close"><i class="la la-close"></i></span>
        <ul id="m_quick_sidebar_tabs" class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist">
            <li class="nav-item m-tabs__item">
                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_quick_sidebar_tabs_messenger"
                    role="tab">Messages</a>
            </li>
            <li class="nav-item m-tabs__item">
                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_quick_sidebar_tabs_settings"
                    role="tab">Settings</a>
            </li>
            <li class="nav-item m-tabs__item">
                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_quick_sidebar_tabs_logs" role="tab">Logs</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="m_quick_sidebar_tabs_messenger" role="tabpanel">
                <div class="m-messenger m-messenger--message-arrow m-messenger--skin-light">
                    <div class="m-messenger__messages m-scrollable">
                        <div class="m-messenger__wrapper">
                            <div class="m-messenger__message m-messenger__message--in">
                                <div class="m-messenger__message-pic">
                                    <img src="../../assets/app/media/img//users/user3.jpg" alt="" />
                                </div>
                                <div class="m-messenger__message-body">
                                    <div class="m-messenger__message-arrow"></div>
                                    <div class="m-messenger__message-content">
                                        <div class="m-messenger__message-username">
                                            Megan wrote
                                        </div>
                                        <div class="m-messenger__message-text">
                                            Hi Bob. What time will be the meeting ?
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-messenger__wrapper">
                            <div class="m-messenger__message m-messenger__message--out">
                                <div class="m-messenger__message-body">
                                    <div class="m-messenger__message-arrow"></div>
                                    <div class="m-messenger__message-content">
                                        <div class="m-messenger__message-text">
                                            Hi Megan. It's at 2.30PM
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-messenger__wrapper">
                            <div class="m-messenger__message m-messenger__message--in">
                                <div class="m-messenger__message-pic">
                                    <img src="../../assets/app/media/img//users/user3.jpg" alt="" />
                                </div>
                                <div class="m-messenger__message-body">
                                    <div class="m-messenger__message-arrow"></div>
                                    <div class="m-messenger__message-content">
                                        <div class="m-messenger__message-username">
                                            Megan wrote
                                        </div>
                                        <div class="m-messenger__message-text">
                                            Will the development team be joining ?
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-messenger__wrapper">
                            <div class="m-messenger__message m-messenger__message--out">
                                <div class="m-messenger__message-body">
                                    <div class="m-messenger__message-arrow"></div>
                                    <div class="m-messenger__message-content">
                                        <div class="m-messenger__message-text">
                                            Yes sure. I invited them as well
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-messenger__datetime">2:30PM</div>
                        <div class="m-messenger__wrapper">
                            <div class="m-messenger__message m-messenger__message--in">
                                <div class="m-messenger__message-pic">
                                    <img src="../../assets/app/media/img//users/user3.jpg" alt="" />
                                </div>
                                <div class="m-messenger__message-body">
                                    <div class="m-messenger__message-arrow"></div>
                                    <div class="m-messenger__message-content">
                                        <div class="m-messenger__message-username">
                                            Megan wrote
                                        </div>
                                        <div class="m-messenger__message-text">
                                            Noted. For the Coca-Cola Mobile App project as well ?
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-messenger__wrapper">
                            <div class="m-messenger__message m-messenger__message--out">
                                <div class="m-messenger__message-body">
                                    <div class="m-messenger__message-arrow"></div>
                                    <div class="m-messenger__message-content">
                                        <div class="m-messenger__message-text">
                                            Yes, sure.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-messenger__wrapper">
                            <div class="m-messenger__message m-messenger__message--out">
                                <div class="m-messenger__message-body">
                                    <div class="m-messenger__message-arrow"></div>
                                    <div class="m-messenger__message-content">
                                        <div class="m-messenger__message-text">
                                            Please also prepare the quotation for the Loop CRM project as well.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-messenger__datetime">3:15PM</div>
                        <div class="m-messenger__wrapper">
                            <div class="m-messenger__message m-messenger__message--in">
                                <div class="m-messenger__message-no-pic m--bg-fill-danger">
                                    <span>M</span>
                                </div>
                                <div class="m-messenger__message-body">
                                    <div class="m-messenger__message-arrow"></div>
                                    <div class="m-messenger__message-content">
                                        <div class="m-messenger__message-username">
                                            Megan wrote
                                        </div>
                                        <div class="m-messenger__message-text">
                                            Noted. I will prepare it.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-messenger__wrapper">
                            <div class="m-messenger__message m-messenger__message--out">
                                <div class="m-messenger__message-body">
                                    <div class="m-messenger__message-arrow"></div>
                                    <div class="m-messenger__message-content">
                                        <div class="m-messenger__message-text">
                                            Thanks Megan. I will see you later.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-messenger__wrapper">
                            <div class="m-messenger__message m-messenger__message--in">
                                <div class="m-messenger__message-pic">
                                    <img src="../../assets/app/media/img//users/user3.jpg" alt="" />
                                </div>
                                <div class="m-messenger__message-body">
                                    <div class="m-messenger__message-arrow"></div>
                                    <div class="m-messenger__message-content">
                                        <div class="m-messenger__message-username">
                                            Megan wrote
                                        </div>
                                        <div class="m-messenger__message-text">
                                            Sure. See you in the meeting soon.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-messenger__seperator"></div>
                    <div class="m-messenger__form">
                        <div class="m-messenger__form-controls">
                            <input type="text" name="" placeholder="Type here..." class="m-messenger__form-input">
                        </div>
                        <div class="m-messenger__form-tools">
                            <a href="" class="m-messenger__form-attachment">
                                <i class="la la-paperclip"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="m_quick_sidebar_tabs_settings" role="tabpanel">
                <div class="m-list-settings m-scrollable">
                    <div class="m-list-settings__group">
                        <div class="m-list-settings__heading">General Settings</div>
                        <div class="m-list-settings__item">
                            <span class="m-list-settings__item-label">Email Notifications</span>
                            <span class="m-list-settings__item-control">
                                <span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
                                    <label>
                                        <input type="checkbox" checked="checked" name="">
                                        <span></span>
                                    </label>
                                </span>
                            </span>
                        </div>
                        <div class="m-list-settings__item">
                            <span class="m-list-settings__item-label">Site Tracking</span>
                            <span class="m-list-settings__item-control">
                                <span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
                                    <label>
                                        <input type="checkbox" name="">
                                        <span></span>
                                    </label>
                                </span>
                            </span>
                        </div>
                        <div class="m-list-settings__item">
                            <span class="m-list-settings__item-label">SMS Alerts</span>
                            <span class="m-list-settings__item-control">
                                <span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
                                    <label>
                                        <input type="checkbox" name="">
                                        <span></span>
                                    </label>
                                </span>
                            </span>
                        </div>
                        <div class="m-list-settings__item">
                            <span class="m-list-settings__item-label">Backup Storage</span>
                            <span class="m-list-settings__item-control">
                                <span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
                                    <label>
                                        <input type="checkbox" name="">
                                        <span></span>
                                    </label>
                                </span>
                            </span>
                        </div>
                        <div class="m-list-settings__item">
                            <span class="m-list-settings__item-label">Audit Logs</span>
                            <span class="m-list-settings__item-control">
                                <span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
                                    <label>
                                        <input type="checkbox" checked="checked" name="">
                                        <span></span>
                                    </label>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="m-list-settings__group">
                        <div class="m-list-settings__heading">System Settings</div>
                        <div class="m-list-settings__item">
                            <span class="m-list-settings__item-label">System Logs</span>
                            <span class="m-list-settings__item-control">
                                <span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
                                    <label>
                                        <input type="checkbox" name="">
                                        <span></span>
                                    </label>
                                </span>
                            </span>
                        </div>
                        <div class="m-list-settings__item">
                            <span class="m-list-settings__item-label">Error Reporting</span>
                            <span class="m-list-settings__item-control">
                                <span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
                                    <label>
                                        <input type="checkbox" name="">
                                        <span></span>
                                    </label>
                                </span>
                            </span>
                        </div>
                        <div class="m-list-settings__item">
                            <span class="m-list-settings__item-label">Applications Logs</span>
                            <span class="m-list-settings__item-control">
                                <span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
                                    <label>
                                        <input type="checkbox" name="">
                                        <span></span>
                                    </label>
                                </span>
                            </span>
                        </div>
                        <div class="m-list-settings__item">
                            <span class="m-list-settings__item-label">Backup Servers</span>
                            <span class="m-list-settings__item-control">
                                <span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
                                    <label>
                                        <input type="checkbox" checked="checked" name="">
                                        <span></span>
                                    </label>
                                </span>
                            </span>
                        </div>
                        <div class="m-list-settings__item">
                            <span class="m-list-settings__item-label">Audit Logs</span>
                            <span class="m-list-settings__item-control">
                                <span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
                                    <label>
                                        <input type="checkbox" name="">
                                        <span></span>
                                    </label>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="m_quick_sidebar_tabs_logs" role="tabpanel">
                <div class="m-list-timeline m-scrollable">
                    <div class="m-list-timeline__group">
                        <div class="m-list-timeline__heading">
                            System Logs
                        </div>
                        <div class="m-list-timeline__items">
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                <a href="" class="m-list-timeline__text">12 new users registered <span
                                        class="m-badge m-badge--warning m-badge--wide">important</span></a>
                                <span class="m-list-timeline__time">Just now</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                <a href="" class="m-list-timeline__text">System shutdown</a>
                                <span class="m-list-timeline__time">11 mins</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-danger"></span>
                                <a href="" class="m-list-timeline__text">New invoice received</a>
                                <span class="m-list-timeline__time">20 mins</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-warning"></span>
                                <a href="" class="m-list-timeline__text">Database overloaded 89% <span
                                        class="m-badge m-badge--success m-badge--wide">resolved</span></a>
                                <span class="m-list-timeline__time">1 hr</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                <a href="" class="m-list-timeline__text">System error</a>
                                <span class="m-list-timeline__time">2 hrs</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                <a href="" class="m-list-timeline__text">Production server down <span
                                        class="m-badge m-badge--danger m-badge--wide">pending</span></a>
                                <span class="m-list-timeline__time">3 hrs</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                <a href="" class="m-list-timeline__text">Production server up</a>
                                <span class="m-list-timeline__time">5 hrs</span>
                            </div>
                        </div>
                    </div>
                    <div class="m-list-timeline__group">
                        <div class="m-list-timeline__heading">
                            Applications Logs
                        </div>
                        <div class="m-list-timeline__items">
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                <a href="" class="m-list-timeline__text">New order received <span
                                        class="m-badge m-badge--info m-badge--wide">urgent</span></a>
                                <span class="m-list-timeline__time">7 hrs</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                <a href="" class="m-list-timeline__text">12 new users registered</a>
                                <span class="m-list-timeline__time">Just now</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                <a href="" class="m-list-timeline__text">System shutdown</a>
                                <span class="m-list-timeline__time">11 mins</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-danger"></span>
                                <a href="" class="m-list-timeline__text">New invoices received</a>
                                <span class="m-list-timeline__time">20 mins</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-warning"></span>
                                <a href="" class="m-list-timeline__text">Database overloaded 89%</a>
                                <span class="m-list-timeline__time">1 hr</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                <a href="" class="m-list-timeline__text">System error <span
                                        class="m-badge m-badge--info m-badge--wide">pending</span></a>
                                <span class="m-list-timeline__time">2 hrs</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                <a href="" class="m-list-timeline__text">Production server down</a>
                                <span class="m-list-timeline__time">3 hrs</span>
                            </div>
                        </div>
                    </div>
                    <div class="m-list-timeline__group">
                        <div class="m-list-timeline__heading">
                            Server Logs
                        </div>
                        <div class="m-list-timeline__items">
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                <a href="" class="m-list-timeline__text">Production server up</a>
                                <span class="m-list-timeline__time">5 hrs</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                <a href="" class="m-list-timeline__text">New order received</a>
                                <span class="m-list-timeline__time">7 hrs</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                <a href="" class="m-list-timeline__text">12 new users registered</a>
                                <span class="m-list-timeline__time">Just now</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                <a href="" class="m-list-timeline__text">System shutdown</a>
                                <span class="m-list-timeline__time">11 mins</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-danger"></span>
                                <a href="" class="m-list-timeline__text">New invoice received</a>
                                <span class="m-list-timeline__time">20 mins</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-warning"></span>
                                <a href="" class="m-list-timeline__text">Database overloaded 89%</a>
                                <span class="m-list-timeline__time">1 hr</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                <a href="" class="m-list-timeline__text">System error</a>
                                <span class="m-list-timeline__time">2 hrs</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                <a href="" class="m-list-timeline__text">Production server down</a>
                                <span class="m-list-timeline__time">3 hrs</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                <a href="" class="m-list-timeline__text">Production server up</a>
                                <span class="m-list-timeline__time">5 hrs</span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                <a href="" class="m-list-timeline__text">New order received</a>
                                <span class="m-list-timeline__time">1117 hrs</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection