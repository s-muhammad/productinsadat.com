@component('admin.layouts.content', ['title' => 'پنل مدیریت'])
    @slot('breadcrumb')
        <li class="breadcrumb-item active">پنل مدیریت</li>
    @endslot
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fa fa-tags"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">تعداد محصولات</span>
                            <span class="info-box-number">{{\App\Models\Product::all()->count()}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-comment"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">تعداد نظرات</span>
                            <span class="info-box-number">{{\App\Models\Comment::all()->count()}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fa fa-shopping-cart"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">فروش</span>
                            <span class="info-box-number">{{\App\Models\Payment::all()->count()}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">تعداد کاربران</span>
                            <span class="info-box-number">{{\App\Models\User::all()->count()}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <!-- TABLE: LATEST ORDERS -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">آخرین سفارشات</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-widget="remove">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                    <tr>
                                        <th>آیدی سفارش</th>
                                        <th>نام کاربر</th>
                                        <th>هزینه سفارش</th>
                                        <th>زمان ثبت سفارش</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(\App\Models\Order::latest()->get()->take(5) as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>{{ $order->price }}</td>
                                        <td>{{ jdate($order->created_at) }}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
{{--                            <a href="{{route('admin.orders.index')}}" class="btn btn-sm btn-secondary float-right">مشاهده همه سفارشات</a>--}}
                        </div>
                        <!-- /.card-footer -->
                    </div>
                </div>
                <!-- /.card -->
                <!-- PRODUCT LIST -->
                <div class="col-md-4">
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">محصولات تازه اضافه شده</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-widget="remove">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <ul class="products-list product-list-in-card pl-2 pr-2">
                            @foreach(\App\Models\Product::latest()->get()->take(4) as $product)
                            <li class="item">
                                <div class="product-img">
                                    <img src="{{$product->image}}" alt="Product Image" class="img-size-50">
                                </div>
                                <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">{{$product->title}}
                                        <span class="badge badge-warning float-left">تومان {{$product->price}}</span></a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-center">
                        <a href="{{route('admin.products.index')}}" class="uppercase">نمایش همه محصولات</a>
                    </div>
                    <!-- /.card-footer -->
                </div>
                </div>
                <!-- /.card -->
            </div>
        </div><!--/. container-fluid -->
    </section>
@endcomponent
