@component('admin.layouts.content', ['title' => 'درباره ما'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item active">درباره ما</li>
    @endslot
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                        @foreach($about as $about)
                            <tr>
                                <th>توضیحات</th>
                                <td>{{!!$about->description!!}}</td>
                            </tr>
                            <tr>
                                <td class="d-flex">
{{--                                    @can('edit-role')--}}
                                        <a href="{{route('admin.about.edit',$about->id)}}" class="btn btn-sm btn-primary">ویرایش</a>
{{--                                    @endcan--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endcomponent
