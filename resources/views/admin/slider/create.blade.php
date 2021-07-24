@component('admin.layouts.content', ['title' => 'افزودن اسلایدر'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item active">افزودن اسلایدر</li>
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
                <form class="form-horizontal" action="{{ route('admin.slider.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">اسلایدر </label>
                            <div class="input-group">
                                <input type="text" id="image1" class="form-control" name="image">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="button-image">انتخاب</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">لینک اسلایدر</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="link">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ثبت تصویر</button>
                        <a href="{{ route('admin.slider.index') }}" class="btn btn-default float-left">لغو</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endcomponent
