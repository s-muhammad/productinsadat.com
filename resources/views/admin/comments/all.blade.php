@component('admin.layouts.content', ['title' => 'لیست نظرات'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item active">لیست نظرات</li>
    @endslot

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">نظرات</h3>

                    <div class="card-tools d-flex">
                        <form action="">
                            <div class="input-group input-group-sm" style="width: 150px;">
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
                                <th>آیدی </th>
                                <th>نام کاربر</th>
                                <th>متن</th>
                                <th>وضعیت </th>
                                <th>اقدامات</th>
                            </tr>

                            @foreach($comments as $comment)
                                <tr>
                                    <td>{{ $comment->id }}</td>
                                    <td>{{ $comment->user->name}}</td>
                                    <td>{{ $comment->comment }}</td>
                                    @if($comment->approved == 1)
                                        <td><span class="badge badge-primary">تایید شده</span></td>
                                    @else
                                        <td><span class="badge badge-warning">تایید نشده</span></td>
                                    @endif
                                    <td class="d-flex">
                                            <form action="{{ route('admin.comments.destroy' , $comment->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger ml-1">حذف</button>
                                            </form>
                                        @if($comment->approved == 0)
                                        <form action="{{ route('admin.comments.update' , $comment->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-success ml-1">تایید</button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {{ $comments->render() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>

@endcomponent
