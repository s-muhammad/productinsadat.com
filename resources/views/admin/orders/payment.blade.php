@component('admin.layouts.content', ['title' => 'لیست سفارشات'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">لیست سفارشات</li>
        <li class="breadcrumb-item active">جزئیات پرداخت {{$order->id}}</li>
    @endslot
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">پرداخت ها</h3>
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
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>آیدی پرداخت</th>
                            <th>شماره پرداخت</th>
                            <th>وضعیت پرداخت</th>
                            <th>زمان پرداخت </th>
                        </tr>
                        @foreach($order->payments as $pay)
                            <tr>
                                <td>{{ $pay->id }}</td>
                                <td>{{ $pay->resnumber}}</td>
                                <td>{{ $pay->status ? 'پرداخت شده':'پرداخت نشده'}}</td>
                                <td>{{ jdate($pay->created_at)->format('%Y-%m-%d') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
{{--                    {{ $payments->appends(['search'=>request('search')])->render() }}--}}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endcomponent
