@component('admin.layouts.content', ['title' => 'لیست منو ها'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item active">منو ها</li>
    @endslot
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">منو ها</h3>
                    <div class="card-tools d-flex">
                        <form action="">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="جستجو" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                        <div class="btn-group-sm mr-1">
{{--                            @can('create-role')--}}
                                <a href="{{ route('admin.menu.create') }}" class="btn btn-info">ایجاد منو جدید</a>
{{--                            @endcan--}}
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>آیدی منو</th>
                                <th>عنوان منو</th>
                                <th>لینک منو</th>
                                <th>اقدامات</th>
                            </tr>
                            @foreach($menus as $menu)
                                <tr>
                                    <td>{{ $menu->id }}</td>
                                    <td>{{ $menu->title }}</td>
                                    <td>{{ $menu->link }}</td>
                                    <td class="d-flex">
{{--                                        @can('delete-role')--}}
                                            <form action="{{ route('admin.menu.destroy' ,  $menu->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger ml-1">حذف</button>
                                            </form>
{{--                                        @endcan--}}
{{--                                        @can('edit-role')--}}
                                            <a href="{{ route('admin.menu.edit' ,$menu->id) }}" class="btn btn-sm btn-primary">ویرایش</a>
{{--                                        @endcan--}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {{ $menus->render() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endcomponent
