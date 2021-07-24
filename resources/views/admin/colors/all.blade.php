@component('admin.layouts.content' , ['title' => 'لیست رنگ بندی ها'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item active">لیست رنگ بندی ها</li>
    @endslot
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">رنگ بندی ها</h3>

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
{{--                            @can('create-category')--}}
                                <a href="{{ route('admin.colors.create') }}" class="btn btn-info">ایجاد رنگ جدید</a>
{{--                            @endcan--}}
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>آیدی </th>
                            <th>رنگ </th>
                            <th>اقدامات</th>
                        </tr>
                        @foreach($colors as $color)
                            <tr>
                                <td>{{ $color->id }}</td>
                                <td>{{ $color->title }}</td>
                                <td class="d-flex">
{{--                                    @can('delete-user')--}}
                                        <form action="{{ route('admin.colors.destroy' , ['color' => $color->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger ml-1">حذف</button>
                                        </form>
{{--                                    @endcan--}}
{{--                                    @can('edit-user')--}}
                                        <a href="{{ route('admin.colors.edit' , ['color' => $color->id]) }}" class="btn btn-sm btn-primary ml-1">ویرایش</a>
{{--                                    @endcan--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
{{--                    {{ $categories->appends([ 'search' => request('search') ])->render() }}--}}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>

@endcomponent
