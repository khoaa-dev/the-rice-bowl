@extends('admin.templates.admin-page')

@section('css')

@endsection

@section('content')
<div class="right_col" role="main" style="min-height: 2000px">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mb-5">QUẢN LÝ MÓN ĂN</h1>
            <div class="row d-flex flex-row justify-content-between m-2">
                <div class="add-account-box">
                    <a href="{{ route('create-food') }}" class="btn btn-primary" id="add-account-admin">Thêm món ăn</a>
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
                                <th class="column-title" style="width: 18%">Tên món ăn</th>
                                <th class="column-title" style="width: 18%">Giá </th>
                                <th class="column-title" style="width: 18%">Hình ảnh </th>
                                <th class="column-title" style="width: 18%">Tên danh mục </th>
                                <th class="column-title" style="width: 18%">Hành động </th>
                            </tr>
                        </thead>

                        <tbody class="text-center" style="font-size: 16px">

                            @foreach ($foods as $food)
                            <tr class="even pointer">
                                <td class="align-items-center ">{{ ++$i }}</td>
                                <td class="align-items-center ">{{ $food->name }}</td>
                                <td class="align-items-center ">{{ number_format($food->price, 0) }} đ</td>
                                <td class="align-items-center ">
                                    <img src="{{ asset($food->image) }}" width="70px" height="70px" alt="">
                                </td>
                                <td class="align-items-center ">{{ $food->category->name }}</td>
                                <td class=" last">
                                    <a href="{{ URL::to('/admin/edit-food/'.$food->id) }}" class="btn btn-warning">Sửa</a>
                                    <a href="{{ URL::to('/admin/delete-food/'.$food->id) }}" class="btn btn-danger" id="btn-view-order">Xóa</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        {{ $foods->links() }}
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection