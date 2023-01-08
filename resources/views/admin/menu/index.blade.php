@extends('admin.templates.admin-page')

@section('css')

@endsection

@section('content')
<div class="right_col" role="main" style="min-height: 2000px">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mb-5">QUẢN LÝ THỰC ĐƠN</h1>
            <div class="row d-flex flex-row justify-content-between m-2">
                <div class="add-account-box">
                    <a href="{{ route('create-menu') }}" class="btn btn-primary" id="add-account-admin">Thêm thực đơn</a>
                </div>
            </div>

            <div class="status">
                @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif
            </div>

            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped jambo_table bulk_action">
                        <thead>
                            <tr class="headings text-center" style="font-size: 20px">
                                <th class="column-title" style="width: 10%">STT </th>
                                <th class="column-title" style="width: 20%">Tên thực đơn</th>
                                <th class="column-title" style="width: 50%">Món ăn</th>
                                <th class="column-title" style="width: 20%">Hành động </th>
                            </tr>
                        </thead>

                        <tbody class="text-center" style="font-size: 16px">

                            @foreach ($menus as $menu)
                            <tr class="even pointer">
                                <td class="align-items-center ">{{ $menu->id }}</td>
                                <td class="align-items-center ">{{ $menu->name }}</td>
                                <td class="align-items-center ">{{ $menu->foods }}</td>
                                <td class=" last">
                                    <a href="{{ URL::to('admin/edit-menu/'.$menu->id) }}" class="btn btn-warning">Sửa</a>
                                    <a href="{{ URL::to('admin/delete-menu/'.$menu->id) }}" class="btn btn-danger" id="btn-view-order">Xóa</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        {{ $menus->links() }}
                    </div>
                </div>


            </div>
        </div>
    </div>
    @endsection

    @section('js')

    @endsection