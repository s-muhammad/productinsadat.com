@component('admin.layouts.content' , ['title' => 'ویرایش منو'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.menu.index') }}">لیست منوها</a></li>
        <li class="breadcrumb-item active">ویرایش منو</li>
    @endslot
    <div class="row">
        <div class="col-lg-12">
            @include('admin.layouts.errors')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> ویرایش منو</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('admin.menu.update' , $menu->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">عنوان منو</label>
                            <input type="code" name="title" class="form-control" id="inputEmail3" placeholder="عنوان منو را وارد کنید" value="{{ old('title', $menu->title) }}">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">لینک منو</label>
                            <input type="code" name="link" class="form-control" id="inputEmail3" placeholder="لینک منو را وارد کنید" value="{{ old('title', $menu->link) }}">
                        </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ویرایش منو</button>
                        <a href="{{ route('admin.menu.index') }}" class="btn btn-default float-left">لغو</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>



@endcomponent
