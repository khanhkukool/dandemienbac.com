@extends('admin.layouts.main')
@section('title','dàn đề')
@section('content')
    <!-- Main content -->
    <section class="content">
        <h1>Dàn đề</h1>
        <a href="{{ url('/admin/dande/create') }}" class="btn btn-primary">
            Thêm mới
        </a>
        <a href="{{ url('/admin/dande/update_result') }}" class="btn btn-primary">
            Cập nhật kết quả
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
                    @php
                        $so_lo_array = explode(";", $dande->so_lo);
                    @endphp
                    <td>
                        @php
                            foreach($so_lo_array AS $value){
                                if(trim($dande->result_lo) == trim($value)){
                                    echo $value;
                                }
                             }
                        @endphp
                    </td>
                    @php
                        $so_de_array = explode(";", $dande->so_de);
                    @endphp
                    <td>
                        @php
                            foreach($so_de_array AS $value){
                                if(trim($dande->result_de) == trim($value)){
                                    echo $value;
                                }
                             }
                        @endphp
                    </td>
                    <td>{{  date('d-m-Y', strtotime($dande->created_at)) }}</td>
                    <td>
                        @if($dande->status == 0)
                        <a href="{{ url('admin/dande/edit/' . $dande->id) }}">
                            <i class="fa fa-pencil-alt"></i>
                        </a>
                        @else
                        <p style="color: green">Đã chỉnh sửa</p>
                        @endif
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
