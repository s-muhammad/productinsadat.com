@component('admin.layouts.content' , ['title' => 'ایجاد رنگ'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.colors.index') }}">لیست رنگ بندی ها</a></li>
        <li class="breadcrumb-item active">ایجاد رنگ</li>
    @endslot
    <div class="row">
        <div class="col-lg-12">
            @include('admin.layouts.errors')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">فرم ایجاد رنگ</h3>
                </div>
                <form class="form-horizontal" action="{{ route('admin.colors.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">رنگ </label>
                            <input type="text" name="title" class="form-control" id="inputEmail3" placeholder="نام رنگ را وارد کنید">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ثبت </button>
                        <a href="{{ route('admin.colors.index') }}" class="btn btn-default float-left">لغو</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>

@endcomponent
