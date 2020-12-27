@extends('./staff/giao-vien/layouts/layout')
@section('title','Thêm mới thông báo')
@section('content')<div class="m-grid__item m-grid__item--fluid m-wrapper m-3">
    <div class="">
        <div class="">
            <!--begin::Portlet-->
            <div class="m-portlet ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                @yield('title')
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <a href="{{route('nha-truong.thong-bao.index')}}" class="btn btn-secondary m-btn m-btn--icon m-btn--wide m-btn--md m--margin-right-10">
                            <span>
                                <i class="la la-arrow-left"></i>
                                <span>Quay lại</span>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <form action="{{route('giao-vien.thong-bao.them_moi.tao')}}" method="post" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator">
                        @csrf
                        <input type="hidden" name="class_id" id="class" value="{{session('class')}}">
                        <input type="hidden" name="role" value="2">
                        <input type="hidden" name="sender_id" value="{{Auth::guard('teacher')->user()->id}}">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Tiêu đề:</label>
                                <div class="col-lg-6">
                                    <input type="text" name="title" class="form-control m-input" placeholder="Nhập tiêu đề">
                                    {!! ShowErrors($errors,'title') !!}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Phạm vi:</label>
                                <div class="col-lg-6">
                                    <select name="range" id="range" onchange="handleChangeRange()" class="form-control">
                                        <option value="2">Cả Lớp</option>
                                        <option value="4">Phụ huynh</option>
                                    </select>
                                    {!! ShowErrors($errors,'range') !!}
                                </div>

                                <div class="col-lg-9 col-md-9 col-sm-12">
                                </div>
                            </div>
                            <div class="form-group m-form__group row d-none" id="receiver_id">
                                <label class="col-lg-2 col-form-label">Phụ huynh:</label>
                                <div class="col-lg-6">
                                    <select name="receiver_id" id="list_parent" class="form-control">
                                    </select>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Nội dung:</label>
                                <div class="col-lg-8">
                                    <textarea name="note"></textarea>
                                    {!! ShowErrors($errors,'note') !!}
                                    <script>
                                        CKEDITOR.replace('note');
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-6">
                                        <button class="btn btn-success">Thêm</button>
                                        <a href="{{route('nha-truong.thong-bao.index')}}" class="btn btn-secondary">Quay
                                            lại</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function handleChangeRange() {
        const range1 = document.querySelector("#range").value;
        if (range1 === "2") {
            document.querySelector("#receiver_id").classList.add('d-none');
        }
        if (range1 === "4") {
            getParent();
            document.querySelector("#receiver_id").classList.remove('d-none');
        }

    }

    function getParent() {
        const ids = document.querySelector('#class').value;
        id = {
            id: ids
        };
        axios.post("{{ route('get-axios.parent')}}", id).then((response) => {
            console.log(response);
            var list = `<option value="0">------------</option>`;
            var class_list = response.data.parents.map((item) => {
                list += `<option value="${item.id}">${item.parent_name}</option>`;
            });
            document.querySelector('#list_parent').innerHTML = list;
        }).catch((error) => {
            if (error.response) {
                console.log(error.response);

            }
            swal("Lỗi");
        });
    }

    function getTeacherInClasss() {
        const range1 = document.querySelector("#range").value;
        if (range1 === "2") {
            document.querySelector("#class_id").classList.remove('d-none');
            document.querySelector("#receiver_id").classList.add('d-none');
        }
    }
</script>
@endsection