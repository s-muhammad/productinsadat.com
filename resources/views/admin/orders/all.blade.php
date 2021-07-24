@component('admin.layouts.content', ['title' => 'لیست سفارشات'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item active">لیست سفارشات</li>

    @endslot

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">سفارشات</h3>

                    <div class="card-tools d-flex">
                        <form action="">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="hidden" value="{{request('type')}}" name="type">
                                <input type="text" name="search" class="form-control float-right" placeholder="جستجو" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                        <div class="btn-group-sm mr-1">
{{--                            @can('create-user')--}}
{{--                                <a href="{{ route('admin.users.create') }}" class="btn btn-info">ایجاد کاربر جدید</a>--}}
{{--                            @endcan--}}
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>آیدی سفارش</th>
                            <th>نام کاربر</th>
                            <th>هزینه سفارش</th>
{{--                            <th>وضعیت سفارش</th>--}}
                            <th>شماره پیگیری پستی</th>
                            <th>زمان ثبت سفارش</th>
                            <th>اقدامات</th>
                        </tr>

                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->price }}</td>
{{--                                <td>{{ $order->status }}</td>--}}
                                <td>{{ $order->tracking_serial ?? ' ثبت نشده' }}</td>
                                <td>{{ jdate($order->created_at) }}</td>
                                <td class="d-flex">
{{--                                    @can('delete-user')--}}
                                        <form action="{{ route('admin.orders.destroy' ,  $order->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger ml-1">حذف</button>
                                        </form>
{{--                                    @endcan--}}
{{--                                    @can('edit-user')--}}
                                        <a href="{{ route('admin.orders.edit' ,$order->id) }}" class="btn btn-sm btn-primary ml-1">ویرایش</a>
{{--                                    @endcan--}}
{{--                                    @if($user->isStaffUser())--}}
{{--                                        @can('staff-user-permissions')--}}
                                            <a href="{{ route('admin.orders.show' , $order->id) }}" class="btn btn-sm btn-warning">جزئیات</a>
                                            <a href="{{ route('admin.orders.payments' , $order->id) }}" class="btn btn-sm btn-info">جزئیات پرداخت</a>
{{--                                        @endcan--}}
{{--                                    @endif--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {{ $orders->render() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>

@endcomponent
