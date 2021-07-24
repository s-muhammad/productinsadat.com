@component('admin.layouts.content', ['title' => 'ویرایش درباره ما'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.about.index') }}">درباره ما</a></li>
        <li class="breadcrumb-item active">ویرایش درباره ما</li>
    @endslot
    @slot('script')
        <script src="/js/ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'description', {
                filebrowserBrowseUrl: '/file-manager/ckeditor',
                filebrowserUploadUrl: '/file-manager/ckeditor'
            });
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
                <form class="form-horizontal" action="{{ route('admin.about.update' , $about->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"> توضیحات</label>
                            <textarea class="form-control" name="description">{{old('description',$about->description)}}</textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ویرایش </button>
                        <a href="{{ route('admin.about.index') }}" class="btn btn-default float-left">لغو</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endcomponent
