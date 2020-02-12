@extends('admin.layouts.main')
@section('title','dàn đề')
@section('content')
    <!-- Main content -->
    <section class="content">
        <h1>Dàn đề</h1>
        <a href="{{ url('/admin/dande/create') }}" class="btn btn-primary">
            Thêm mới
        </a>
        <table class="table table-bordered table-striped">
            <tr>
                <th>ID</th>
                <th>Số lô</th>
                <th>Số đề</th>
                <th>Kết quả lô</th>
                <th>Kết quả đề</th>
                <th>Time</th>
                <th>Chỉnh sửa</th>
            </tr>
            @foreach($dandes AS $dande)
                <tr>
                    <td>{{ $dande->id }}</td>
                    <td>{{ $dande->so_lo }}</td>
                    <td>{{ $dande->so_de }}</td>
                    <td>{{ $dande->result_lo }}</td>
                    <td>{{ $dande->result_de }}</td>
                    <td>{{  date('d-m-Y', strtotime($dande->created_at)) }}</td>
                    <td>
                        @if($dande->status == 0)
                            <a href="{{ url('admin/dande/edit/' . $dande->id) }}">
                                <span>Chỉnh sửa</span> &nbsp;
                            </a>
                        @else
                            <span style="color: green">Đã chỉnh sửa</span> &nbsp;
                        @endif
                        <a href="{{ url('admin/dande/update_result/' . $dande->id) }}">
                            <span>Cập nhật kết quả</span> &nbsp;
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
        <div style="text-align: center">
            {{ $dandes->links() }}
        </div>
    </section>
    <!-- /.content -->
@endsection
