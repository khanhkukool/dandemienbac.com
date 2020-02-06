@extends('admin.layouts.main')
@section('title','cards')
@section('content')
    <!-- Main content -->
    <section class="content">
        <h1>Danh sách banner</h1>
        <a href="{{ url('/admin/cards/create') }}" class="btn btn-primary">
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
                <th></th>
            </tr>
            @foreach($dandes AS $dande)
                <tr>
                    <td>{{ $dande->id }}</td>
                    <td>{{ $dande->so_lo }}</td>
                    <td>{{ $dande->so_de }}</td>
                    <td>{{ $dande->result_lo }}</td>
                    <td>{{ $dande->result_de }}</td>
                    <td>{{  date('d-m-Y H:i:s', strtotime($dande->created_at)) }}</td>
                    <td>
                        <a href="{{ url('backend/users/show/' . $dande->id) }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ url('backend/users/eidt/' . $dande->id) }}">
                            <i class="fa fa-pencil-alt"></i> &nbsp;
                        </a>
                        <a href="{{ url('backend/users/delete/' . $dande->id) }}"
                           onclick="return confirm('Bạn có muốn xóa hay ko?')">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
        <div style="text-align: center">
            {{--            {{ $card->links() }}--}}
        </div>
    </section>
    <!-- /.content -->
@endsection
