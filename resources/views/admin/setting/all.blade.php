@component('admin.layouts.content', ['title' => 'مقام ها'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item active">مقام ها</li>
    @endslot
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                        @foreach($setting as $setting)
                            <tr>
                                <th>لوگو</th>
                                <td><img src="{{$setting->logo}}" alt="" width="50px"></td>
                            </tr>
                            <tr>
                                <th>توضیحات</th>
                                <td>{{$setting->description}}</td>
                            </tr>
                            <tr>
                                <th>تلفن</th>
                                <td>{{$setting->tel}}</td>
                            </tr>
                            <tr>
                                <th>واتساپ</th>
                                <td>{{$setting->whatsapp}}</td>
                            </tr>
                            <tr>
                                <th>تلگرام</th>
                                <td>{{$setting->telegram}}</td>
                            </tr>
                            <tr>
                                <th>اینستاگرام</th>
                                <td>{{$setting->instagram}}</td>
                            </tr>
                            <tr>
                                <th>ایمیل</th>
                                <td>{{$setting->mail}}</td>
                            </tr>
                            <tr>
                                <td class="d-flex">
                                    @can('edit-role')
                                        <a href="{{route('admin.setting.edit',$setting->id)}}" class="btn btn-sm btn-primary">ویرایش</a>
                                    @endcan
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
