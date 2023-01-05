@extends('admin.templates.admin-page')

@section('css')
<link rel="stylesheet" href="{{ asset('public/front-end/css/service.css') }}">
@endsection

@section('content')
<div class="right_col row content" role="main">
    <div class="x_content col-11" style="margin-left: 20px">

        <h3>Danh sách dịch vụ</h3>

        <div class="status">
            @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
        </div>

        <div class="table-responsive">

            <a href="{{route('service.create')}}"><i class="fa fa-plus-square"></i></a>
            <table class="table table-striped jambo_table bulk_action">
                <thead>
                    <tr class="headings">
                        <th>STT</th>
                        <th class="column-title">TÊN DỊCH VỤ </th>
                        <th class="column-title">CHI TIẾT DỊCH VỤ </th>
                        <th class="column-title no-link last">
                            <span class="nobr">ACTION</span>
                        </th>
                        <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions
                                ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i=1;?>
                    @foreach ($data_all_services as $service)
                    <tr class="even pointer">
                        <td><?php echo $i++; ?></td>
                        <th>{{ $service->name }}</th>
                        <th style="width: 60%">{{ $service->detail }}</th>
                        <th>
                            <a href="{{route('service.edit', $service->id) }}">
                                <i class="fa fa-edit"></i></a>
                            <a href="{{ route('service.destroy', $service->id)}}">
                                <i class="   fa fa-remove"></i>
                            </a>
                        </th>
                    </tr>
                    @endforeach

                </tbody>

            </table>

            <div class="d-flex justify-content-center">
                {{ $service->links }}
            </div>
        </div>
    </div>

</div>
@endsection

@section('js')

@endsection