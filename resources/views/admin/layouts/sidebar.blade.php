<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{ route('admin.') }}" class="nav-link {{ isActive('admin.') }}">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p> داشبورد</p>
                        </a>
                    </li>
                    @can('show-users')
                        <li class="nav-item has-treeview {{ isActive(['admin.users.index' , 'admin.users.create' , 'admin.users.edit'] , 'menu-open') }}">
                            <a href="#" class="nav-link {{ isActive('admin.users.index') }}">
                                <i class="nav-icon fa fa-users"></i>
                                <p>
                                    کاربران
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.users.index') }}" class="nav-link {{ isActive(['admin.users.index' , 'admin.users.create' , 'admin.users.edit']) }}">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>لیست کاربران</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endcan
                    @canany(['show-permissions','show-roles'])
                    <li class="nav-item has-treeview {{ isActive(['admin.permissions.index','admin.permissions.create', 'admin.roles.index'] , 'menu-open') }}">
                        <a href="#" class="nav-link  {{ isActive(['admin.permissions.index' , 'admin.roles.index']) }}">
                            <i class="nav-icon fa fa-user-times"></i>
                            <p>
                                 دسترسی کاربران
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        @can('show-roles')
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.roles.index') }}" class="nav-link  {{ isActive('admin.roles.index') }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>همه مقام ها</p>
                                </a>
                            </li>
                        @endcan
                        @can('show-permissions')
                            <li class="nav-item">
                                <a href="{{ route('admin.permissions.index') }}" class="nav-link {{ isActive('admin.permissions.index') }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>همه دسترسی ها</p>
                                </a>
                            </li>
                        </ul>
                        @endcan
                    </li>
                    @endcanany
                    <li class="nav-item has-treeview {{ isActive(['admin.products.index' , 'admin.products.create' , 'admin.products.edit', 'admin.categories.index'] , 'menu-open') }}">
                        <a href="#" class="nav-link  {{ isActive('admin.products.index') }}">
                            <i class="nav-icon fa fa-shopping-basket"></i>
                            <p>
                                محصولات
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.products.index') }}" class="nav-link {{ isActive('admin.products.index') }} ">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست محصولات</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.categories.index') }}" class="nav-link {{ isActive('admin.categories.index') }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>دسته بندی محصولات</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.sizes.index') }}" class="nav-link {{ isActive('admin.sizes.index') }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>سایز بندی محصولات</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.colors.index') }}" class="nav-link {{ isActive('admin.colors.index') }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>رنگ بندی محصولات</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview {{ isActive(['admin.comments.index' ] , 'menu-open') }}">
                        <a href="#" class="nav-link {{ isActive('admin.comments.index') }}">
                            <i class="nav-icon fa fa-comment"></i>
                            <p>
                                نظرات
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.comments.index') }}" class="nav-link {{ isActive('admin.comments.index') }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست نظرات</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview {{ isActive(['admin.discount.index' ] , 'menu-open') }}">
                        <a href="#" class="nav-link {{ isActive('admin.discount.index') }}">
                            <i class="nav-icon fa fa-gift"></i>
                            <p>
                                تخفیف ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.discount.index') }}" class="nav-link {{ isActive('admin.discount.index') }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست تخفیف ها</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview {{ isActive(['admin.menu.index' ] , 'menu-open') }}">
                        <a href="#" class="nav-link {{ isActive('admin.menu.index') }}">
                            <i class="nav-icon fa fa-cogs"></i>
                            <p>
                                تنظیمات
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.menu.index') }}" class="nav-link {{ isActive('admin.menu.index') }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست منو ها</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.setting.index') }}" class="nav-link {{ isActive('admin.setting.index') }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>تنظیمات</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.slider.index') }}" class="nav-link {{ isActive('admin.slider.index') }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>اسلایدرها</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.banner.index') }}" class="nav-link {{ isActive('admin.banner.index') }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>بنرهای سایت</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.about.index') }}" class="nav-link {{ isActive('admin.about.index') }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>درباره ما</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview {{ isActive(['admin.orders.index' ] , 'menu-open') }}">
                        <a href="#" class="nav-link {{ isActive('admin.orders.index') }}">
                            <i class="nav-icon fa fa-shopping-bag"></i>
                            <p>
                                سفارشات
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.orders.index',['type'=>'paid'])}}" class="nav-link {{isUrl(route('admin.orders.index',['type'=>'paid']))}}">
                                    <i class="nav-icon fa fa-circle-o text-success"></i>
                                    <p class="text">
                                        پرداخت شده
                                        <span class="badge badge-success right">{{\App\Models\Order::whereStatus('paid')->count()}}</span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.orders.index',['type'=>'unpaid'])}}" class="nav-link {{isUrl(route('admin.orders.index',['type'=>'unpaid']))}}">
                                    <i class="nav-icon fa fa-circle-o text-danger"></i>
                                    <p class="text">پرداخت نشده
                                        <span class="badge badge-danger right">{{\App\Models\Order::whereStatus('unpaid')->count()}}</span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.orders.index',['type'=>'preparation'])}}" class="nav-link {{isUrl(route('admin.orders.index',['type'=>'preparation']))}}">
                                    <i class="nav-icon fa fa-circle-o text-warning"></i>
                                    <p class="text">در حال پردازش
                                        <span class="badge badge-warning right">{{\App\Models\Order::whereStatus('preparation')->count()}}</span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.orders.index',['type'=>'received'])}}" class="nav-link {{isUrl(route('admin.orders.index',['type'=>'received']))}}">
                                    <i class="nav-icon fa fa-circle-o text-info"></i>
                                    <p class="text">دریافت شده
                                        <span class="badge badge-info right">{{\App\Models\Order::whereStatus('received')->count()}}</span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.orders.index',['type'=>'canceled'])}}" class="nav-link {{isUrl(route('admin.orders.index',['type'=>'canceled']))}}">
                                    <i class="nav-icon fa fa-circle-o text-danger"></i>
                                    <p class="text">لغو شده
                                        <span class="badge badge-danger right">{{\App\Models\Order::whereStatus('canceled')->count()}}</span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.orders.index',['type'=>'posted'])}}" class="nav-link {{isUrl(route('admin.orders.index',['type'=>'posted']))}}">
                                    <i class="nav-icon fa fa-circle-o text-primary"></i>
                                    <p class="text">ارسال شده
                                        <span class="badge badge-primary right">{{\App\Models\Order::whereStatus('posted')->count()}}</span>
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
