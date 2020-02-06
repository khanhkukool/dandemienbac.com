@extends('admin.layouts.main')
@section('title','cards')
@section('content')
    <!-- Main content -->
    <section class="content">
        <h1>Danh sách nạp thẻ</h1>
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
                <th></th>
            </tr>
            @foreach($cards AS $card)
                <tr>
                    <td>{{ $card->id }}</td>
                    <td>{{ $card->pin }}</td>
                    <td>{{ $card->seri }}</td>
                    <td>{{ $card->card_value }}</td>
                    <td>{{  date('H:i:s d-m-Y', strtotime($card->created_at)) }}</td>
                    <td>
                        <a href="{{ url('admin/cards/edit/' . $card->id) }}">
                            <i class="fa fa-pencil-alt"></i> &nbsp;
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
