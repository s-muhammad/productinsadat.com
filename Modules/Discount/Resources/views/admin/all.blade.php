@component('admin.layouts.content', ['title' => 'لیست تخفیف ها'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item active">تخفیف ها</li>
    @endslot
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">تخفیف ها</h3>
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
                                <a href="{{ route('admin.discount.create') }}" class="btn btn-info">ایجاد تخفیف جدید</a>
{{--                            @endcan--}}
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>آیدی تخفیف</th>
                                <th>کد تخفیف</th>
                                <th>میزان تخفیف</th>
                                <th>مربوط به کاربر</th>
                                <th>مربوط به محصول</th>
                                <th>مربوط به دسته بندی</th>
                                <th>مهلت استفاده</th>
                                <th>اقدامات</th>
                            </tr>
                            @foreach($discounts as $discount)
                                <tr>
                                    <td>{{ $discount->id }}</td>
                                    <td>{{ $discount->code }}</td>
                                    <td>{{ $discount->percent }}</td>
                                    <td>{{ $discount->users->count() ? $discount->users->pluck('name')->join(', ') : 'همه کاربران'}}</td>
                                    <td>{{ $discount->products->count() ? $discount->products->pluck('title')->join(', ') : 'همه محصولات'}}</td>
                                    <td>{{ $discount->categories->count() ? $discount->categories->pluck('name')->join(', ') : 'همه دسته ها'}}</td>
                                    <td>{{ jdate($discount->expired_at) }}</td>
                                    <td class="d-flex">
{{--                                        @can('delete-role')--}}
                                            <form action="{{ route('admin.discount.destroy' ,  $discount->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger ml-1">حذف</button>
                                            </form>
{{--                                        @endcan--}}
{{--                                        @can('edit-role')--}}
                                            <a href="{{ route('admin.discount.edit' ,$discount->id) }}" class="btn btn-sm btn-primary">ویرایش</a>
{{--                                        @endcan--}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {{ $discounts->render() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endcomponent
