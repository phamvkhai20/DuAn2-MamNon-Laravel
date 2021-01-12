@extends('./web/login/layouts/layout')
@section('title','Giới thiệu trường học')
@section('content')
<section style="padding-top: 150px;">
    <div class="container" style="height: 150px;">
    <div class="_page_banner">
		<img class="_decor" src=" ">
		<div class="kids_online_container text-center">
			<div class="_page_nav">
				<a href="javascript:void(0)">Trang chủ</a>
				<span> / </span>
				<a href="javascript:void(0)">Liên hệ</a>
			</div>
			<div class="_page_name" style="    color: #F0645E;"><h1>Liên hệ</h1></div>
		</div>
	</div>
    </div>
</section>
<section style="background-image: url('https://kidsonline.edu.vn/wp-content/themes/kids-online/assets/images/contact/decor_frm.png');">
    <div class="container" style="padding-top: 50px;margin-bottom: 31px;">
        <div class="row">
            <div class="col-5" style="background-image: url('https://kidsonline.edu.vn/wp-content/themes/kids-online/assets/images/home/s9_deocr.png'); background-repeat: no-repeat;">
                <h1>Quý trường đăng ký trải nghiệm</h1>
                <form action="{{route('lien-he.save_add')}}" method="post">
                @csrf
                    <div class="form-group">
                        <input type="text" name="contact_name" style="border-radius: 15px;height: 45px;margin-top: 50px;margin-bottom: 10px;" class="form-control" id="exampleFormControlInput1" placeholder="Họ tên:">
                        <span class="error-message text-danger">{{ $errors->first('contact_name') }}</span></p>
                    </div>
                    <div class="form-group">
                        <input type="text" name="contact_phone" style="border-radius: 15px;height: 45px; margin-top: 20px; margin-bottom: 10px;" class="form-control" id="exampleFormControlInput1" placeholder="Số điện thoại: ">
                        <span class="error-message text-danger">{{ $errors->first('contact_phone') }}</span></p>
                    </div>
                    <div class="form-group">
                        <input type="email" name="contact_email" style="border-radius: 15px;height: 45px;margin-top: 20px; margin-bottom: 10px;" class="form-control" id="exampleFormControlInput1" placeholder="Địa chỉ email: ">
                        <span class="error-message text-danger">{{ $errors->first('contact_email') }}</span></p>
                    </div>  
                    <div class="form-group">
                        <textarea type="text" name="detail" class="form-control" style="border-radius: 15px;margin-top: 20px;margin-bottom: 10px;" id="exampleFormControlTextarea1" rows="4" placeholder="Lời nhắn "></textarea>
                        <span class="error-message text-danger">{{ $errors->first('detail') }}</span></p>
                    </div>
                    <button type="submit" style="outline: none;border: 0;margin-top: 35px;    display: flex;align-items: center;min-width: 160px;max-width: max-content; height: 50px;background: linear-gradient(94.91deg,#F9A91A 1.3%,#F0645E 69.22%);border-radius: 0 25.5px 25.5px 25.5px;padding: 0 10px 0 25px;font-size: 14px;letter-spacing: .04em; color: #FFF;text-transform: uppercase;transition: all .3s ease;" class="btn_def">Đăng ký <img src="https://kidsonline.edu.vn/wp-content/themes/kids-online/assets/images/home/btn_icon.png"></button>
                </form>
            </div>
            <div class="col-7">
                <img src="https://kidsonline.edu.vn/wp-content/themes/kids-online/assets/images/home/s9_img1.png" alt="" style="width: 118%;">
            </div>
        </div>
    </div>
</section>
@endsection