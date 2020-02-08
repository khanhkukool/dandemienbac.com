@extends('admin.layouts.main')
@section('title','cards')
@section('content')
    <!-- Main content -->
    <section class="content">
        <h1>Danh sách nạp thẻ</h1>
        @if(session()->has('success'))
            <h3 style="color: green">
                Nạp thẻ thành công
            </h3>
        @endif
        <a href="{{ url('/admin/cards/create') }}" class="btn btn-primary">
            Thêm mới
        </a>
        <table class="table table-bordered table-striped">
            <tr>
                <th>ID</th>
                <th>Pin</th>
                <th>Seri</th>
                <th>Mệnh giá</th>
                <th>Time</th>
            </tr>
            @foreach($cards AS $card)
                <tr>
                    <td>{{ $card->id }}</td>
                    <td>{{ $card->pin }}</td>
                    <td>{{ $card->seri }}</td>
                    <td>{{ $card->card_value }}</td>
                    <td>{{  date('H:i:s d-m-Y', strtotime($card->created_at)) }}</td>
                </tr>
            @endforeach
        </table>
        <div style="text-align: center">
{{--            {{ $card->links() }}--}}
        </div>
    </section>
    <!-- /.content -->
    @endsection
