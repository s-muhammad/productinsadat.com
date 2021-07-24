@component('admin.layouts.content' , ['title' => 'ایجاد منو'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.menu.index') }}">لیست منوها</a></li>
        <li class="breadcrumb-item active">ایجاد منو</li>
    @endslot
    <div class="row">
        <div class="col-lg-12">
            @include('admin.layouts.errors')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">فرم ایجاد منو</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('admin.menu.store') }}" method="POST">
                    @csrf

                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">عنوان منو</label>
                            <input type="text" name="title" class="form-control" id="inputEmail3" placeholder="عنوان منو را وارد کنید" value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">لینک منو</label>
                            <input type="text" name="link" class="form-control" id="inputEmail3" placeholder="لینک منو را وارد کنید" value="{{ old('link') }}">
                        </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ثبت منو</button>
                        <a href="{{ route('admin.menu.index') }}" class="btn btn-default float-left">لغو</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>
@endcomponent
