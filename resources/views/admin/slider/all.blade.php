@component('admin.layouts.content', ['title' => 'لیست اسلایدرها'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item active">گالری اسلایدر</li>
    @endslot
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">اسلایدرها</h3>
                    <div class="card-tools d-flex">
                        <div class="btn-group-sm mr-1">
{{--                            @can('create-user')--}}
                                <a href="{{ route('admin.slider.create') }}" class="btn btn-info">افزودن اسلایدر جدید</a>
{{--                            @endcan--}}
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        @foreach($sliders as $image)
                            <div class="col-sm-2">
                                <a href="{{ url($image['image']) }}">
                                    <img src="{{ url($image['image']) }}" class="img-fluid mb-2" alt="{{$image['alt']}}">
                                </a>
                                <form action="{{ route('admin.slider.destroy' , ['slider' => $image->id]) }}" id="image-{{ $image->id }}" method="post">
                                    @method('delete')
                                    @csrf
                                </form>
                                <a href="{{ route('admin.slider.edit' , ['slider' => $image->id]) }}" class="btn btn-sm btn-primary">ویرایش</a>
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
