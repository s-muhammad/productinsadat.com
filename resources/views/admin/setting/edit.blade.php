@component('admin.layouts.content', ['title' => 'ویرایش تنظیمات'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.setting.index') }}">تنظیمات</a></li>
        <li class="breadcrumb-item active">ویرایش تنظیمات</li>
    @endslot
    @slot('script')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                document.getElementById('button-image').addEventListener('click', (event) => {
                    event.preventDefault();
                    inputId = 'image1';
                    window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
                });
            });
            // input
            let inputId = '';
            // set file link
            function fmSetLink($url) {
                document.getElementById(inputId).value = $url;
            }
        </script>
    @endslot
    <div class="row">
        <div class="col-lg-12">
            @include('admin.layouts.errors')
            <div class="card">
                <form class="form-horizontal" action="{{ route('admin.setting.update' , $setting->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"> لوگو</label>
                            <div class="input-group">
                                <input type="text" id="image1" class="form-control" name="logo">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="button-image">انتخاب</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"> تلفن</label>
                            <input type="text" class="form-control" name="tel" value="{{old('tel',$setting->tel)}}">
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"> توضیحات</label>
                            <textarea class="form-control" name="description">{{old('description',$setting->description)}}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"> تلگرام</label>
                            <input type="text" class="form-control" name="telegram" value="{{old('telegram',$setting->telegram)}}">
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"> واتساپ</label>
                            <input type="text" class="form-control" name="whatsapp" value="{{old('whatsapp',$setting->whatsapp)}}">
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"> اینستاگرام</label>
                            <input type="text" class="form-control" name="instagram" value="{{old('instagram',$setting->instagram)}}">
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"> ایمیل</label>
                            <input type="text" class="form-control" name="mail" value="{{old('mail',$setting->mail)}}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ویرایش </button>
                        <a href="{{ route('admin.setting.index') }}" class="btn btn-default float-left">لغو</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endcomponent
