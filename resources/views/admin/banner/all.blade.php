@component('admin.layouts.content', ['title' => 'لیست بنر'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item active">لیست بنرها</li>
    @endslot
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">بنرها</h3>
                    <div class="card-tools d-flex">
                        <div class="btn-group-sm mr-1">
{{--                            @can('create-user')--}}
                                <a href="{{ route('admin.banner.create') }}" class="btn btn-info">افزودن بنر جدید</a>
{{--                            @endcan--}}
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        @foreach($banners as $image)
                            <div class="col-sm-2">
                                <a href="{{ url($image['image']) }}">
                                    <img src="{{ url($image['image']) }}" class="img-fluid mb-2" >
                                </a>
                                <form action="{{ route('admin.banner.destroy' , ['banner' => $image->id]) }}" id="image-{{ $image->id }}" method="post">
                                    @method('delete')
                                    @csrf
                                </form>
                                <a href="{{ route('admin.banner.edit' , ['banner' => $image->id]) }}" class="btn btn-sm btn-primary">ویرایش</a>
                                <a href="#" class="btn btn-sm btn-danger" onclick="document.getElementById('image-{{ $image->id }}').submit()">حذف</a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
{{--                    {{ $products->appends(['search'=>request('search')])->render() }}--}}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endcomponent
