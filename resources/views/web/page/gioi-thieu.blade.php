@extends('./web/login/layouts/layout')
@section('title','Giới thiệu trường học')
@section('content')
<div class="home_wrapper">
            <div class="home_background_none">
                <div class="container">
                    <div class="home_intro">
                        <div class="intro_title" align="center">
                            <h2>
                                Coniu - Tự hào là phần mềm mầm non được phụ huynh trên cả nước
                                tin yêu
                            </h2>
                        </div>
                        <div class="intro_content">
                            <div class="row intro_content_row">
                                <div class="intro_content_in">
                                    <div class="col-sm-4 content_col">
                                        <div class="content_pad">
                                            <div class="content_icon" align="center">
                                                <div class="content-radius">
                                                    <img class="content_img img-responsive"
                                                        src="{{asset('assets_staff/trangchu/parent.png')}}"
                                                        alt="Lợi ích của phần mềm mầm non Coniu với phụ huynh" />
                                                </div>
                                            </div>
                                            <div class="content_header" align="center">
                                                <h3 class="content_header_text">
                                                    Lợi ích của Phụ huynh
                                                </h3>
                                            </div>
                                            <div class="content_text">
                                                <ul>
                                                    <li>
                                                        Chia sẻ, học hỏi kinh nghiệm nuôi dạy trẻ với cộng
                                                        đồng các mẹ thông thái .
                                                    </li>
                                                    <li>
                                                        Tham khảo ý kiến, tư vấn chuyên gia về các vấn đề
                                                        thắc mắc.
                                                    </li>
                                                    <li>
                                                        Sử dụng sổ y bạ điện tử: biểu đồ chiều cao, cân
                                                        nặng; tiểu sử bệnh và lịch sử uống thuốc…
                                                    </li>
                                                    <li>
                                                        Tìm trường phù hợp cho con đơn giản thông qua chức
                                                        năng 'Tìm trường quanh đây' .
                                                    </li>
                                                    <li>
                                                        Tìm kiếm video, truyện cổ tích, truyện ngụ ngôn
                                                        cho con phù hợp .
                                                    </li>
                                                    <li>
                                                        Cập nhật, trao đổi với giáo viên về hoạt động vui
                                                        chơi, sinh hoạt, học tập của trẻ .
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 content_col">
                                        <div class="content_pad">
                                            <div class="content_icon" align="center">
                                                <div class="content-radius">
                                                    <img class="content_img img-responsive"
                                                    src="{{asset('assets_staff/trangchu/teacher.png')}}"
                                                        alt="Lợi ích của phần mềm mầm non Coniu với Giáo viên" />
                                                </div>
                                            </div>
                                            <div class="content_header" align="center">
                                                <h3 class="content_header_text">
                                                    Lợi ích của Giáo viên
                                                </h3>
                                            </div>
                                            <div class="content_text">
                                                <ul>
                                                    <li>
                                                        Chia sẻ, học hỏi kinh nghiệm mầm non với cộng đồng
                                                        giáo viên, chuyên gia .
                                                    </li>
                                                    <li>
                                                        Trao đổi, chia sẻ với phụ huynh nhanh chóng, trực
                                                        tiếp trên điện thoại .
                                                    </li>
                                                    <li>
                                                        Quản lý lớp học dễ dàng: thông báo, đăng ký sự
                                                        kiện, điểm danh, đón muộn, nhận xét về trẻ .
                                                    </li>
                                                    <li>
                                                        Thông tin minh bạch, tránh hiểu lầm giữa phụ huynh
                                                        – giáo viên .
                                                    </li>
                                                    <li>
                                                        Giảm thiểu công việc giấy tờ và trao đổi với bộ
                                                        phận khác (kế toán, nhà bếp…) .
                                                    </li>
                                                    <li>
                                                        Giảm thiểu tối đa thao tác nhờ các biểu mẫu và
                                                        tính toán tự động .
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 content_col">
                                        <div class="content_pad">
                                            <div class="content_icon" align="center">
                                                <div class="content-radius">
                                                    <img class="content_img img-responsive"
                                                    src="{{asset('assets_staff/trangchu/school.png')}}"
                                                        alt="Lợi ích của phần mềm mầm non Coniu với nhà trường" />
                                                </div>
                                            </div>
                                            <div class="content_header" align="center">
                                                <h3 class="content_header_text">
                                                    Lợi ích của Nhà trường
                                                </h3>
                                            </div>
                                            <div class="content_text">
                                                <ul>
                                                    <li>
                                                        Không phải đầu tư ban đầu (chỉ cần đăng ký sử
                                                        dụng).
                                                    </li>
                                                    <li>
                                                        Dễ dàng quảng bá hình ảnh nhà trường tới cộng
                                                        đồng, hỗ trợ công tác tuyển sinh .
                                                    </li>
                                                    <li>
                                                        Quản lý mọi thông tin hàng ngày của trường trên
                                                        điện thoại, thống kê nhanh chóng.
                                                    </li>
                                                    <li>
                                                        Kết nối liên thông giữa các bộ phận trong trường
                                                        (giáo viên, kế toán, nhà bếp…).
                                                    </li>
                                                    <li>
                                                        Chia sẻ, trao đổi và thông báo tới giáo viên, phụ
                                                        huynh nhanh chóng .
                                                    </li>
                                                    <li>
                                                        Kịp thời nắm bắt ý kiến phụ huynh và có điều chỉnh
                                                        phù hợp.
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content_trial" align="center">
                            <a href="https://coniu.vn/#" data-toggle="tab" class="btn btn-success js_free-trial">ĐĂNG KÝ
                                MIỄN PHÍ CHO TRƯỜNG</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="home_background economi_back" style="
            background: url(&#39;https://coniu.vn/content/themes/coniu/images/home_new/background_economi.jpg&#39;);
          ">
                <div class="container">
                    <div class="home_intro">
                        <div class="intro_title" align="center" style="padding-bottom: 0">
                            <h2>150+ trường đã chọn Coniu để quản lý tốt hơn</h2>
                        </div>
                        <div class="intro_des" align="center">
                            <h4>
                                Coniu là mạng xã hội mầm non, kết nối các bậc phụ huynh thông
                                thái. Ngoài ra, Coniu là phần mềm quản lý mầm non thông minh
                                và hỗ trợ kết nối nhà trường - phụ huynh. Đăng ký sử dụng phần
                                mềm mầm non Coniu cho trường, vui lòng liên hệ :
                            </h4>
                        </div>
                        <div class="intro_content">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="economi_box" align="center">
                                        <div class="economi_icon">
                                            <img class="img-responsive"
                                            src="{{asset('assets_staff/trangchu/support.png')}}"
                                                alt="Liên hệ sử dụng Phần mềm mầm non Coniu" />
                                        </div>
                                        <div class="economi_title">
                                            <p>HỖ TRỢ 24/7</p>
                                        </div>
                                        <div class="economi_short">
                                            <p>
                                                Tất cả các ngày trong tuần (từ Thứ 2 đến Chủ nhật) |
                                                Ban ngày và ban đêm.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="economi_box" align="center">
                                        <div class="economi_icon">
                                            <img class="img-responsive"
                                            src="{{asset('assets_staff/trangchu/contact.png')}}"
                                                alt="Liên hệ sử dụng Phần mềm mầm non Coniu" />
                                        </div>
                                        <div class="economi_title">
                                            <p>
                                                HOTLINE: <a href="tel:0966 900 466">0966 900 466</a>
                                            </p>
                                        </div>
                                        <div class="economi_short">
                                            <p>
                                                Tổng đài tư vấn Miễn phí dành cho khách hàng Coniu.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="economi_box" align="center">
                                        <div class="economi_icon">
                                            <img class="img-responsive"
                                            src="{{asset('assets_staff/trangchu/email.png')}}"
                                                alt="Liên hệ sử dụng Phần mềm mầm non Coniu" />
                                        </div>
                                        <div class="economi_title">
                                            <p>
                                                EMAIL:
                                                <a href="mailto:lienhe@coniu.vn">lienhe@coniu.vn</a>
                                            </p>
                                        </div>
                                        <div class="economi_short">
                                            <p>
                                                Chúng tôi trả lời email của bạn nhanh nhất có thể.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
       
</div>

@endsection