@extends('layouts.main')
@section('content')
    <div class="header">
        <div class="container">
            <div class="header-logo">
                <a class="logo" href="{{ url('/index') }}">
                    <img src="{{ url('assets/images/logo-web-napthengay.png') }}" alt="">
                </a>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="left-form col-md-5 col-12">
                    @if((session()->get('card_session')) == (date('d-m-Y')))
                        <h3>Hôm nay bạn đã nạp thẻ</h3>
                        <h4 style="color: green">Dàn đề hôm nay là</h4>
                        <table class="table table-bordered table-striped list-dande">
                            <tr>
                                <th>Ngày</th>
                                <th>Dàn lô</th>
                                <th>Dàn đề</th>
                            </tr>
                            @php($array_dande_today = get_object_vars(session('dande_today')))
                            <td>{{ date('d-m-Y', strtotime($array_dande_today['created_at'])) }}</td>
                            <td>{{ $array_dande_today['so_lo'] }}</td>
                            <td>{{ $array_dande_today['so_de'] }}</td>
                        </table>
                    @else
                        <form class="form-horizontal form-napthengay" role="form" method="post"
                              action="{{ url('create') }}">
                            @csrf
                            <h3 style="text-align: center">Nạp thẻ để nhận dàn đề</h3>
                            <p style="color: red">Chỉ được dùng thẻ Viettel có mệnh giá 200.000đ</p>
                            <div class="form-group">
                                <label for="txtpin" class="col-lg-2 control-label">Loại thẻ</label>
                                <div class="col-lg-10">
                                    <select class="form-control" name="chonmang">
                                        <option>Viettel</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtpin" class="col-lg-2 control-label">Mệnh giá</label>
                                <div class="col-lg-10">
                                    <select class="form-control" name="card_value">
                                        <option value="200000">200,000</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtpin" class="col-lg-2 control-label">Mã thẻ</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="txtpin" name="pin" placeholder="Mã thẻ"
                                           data-toggle="tooltip" data-title="Mã số sau lớp bạc mỏng"/>
                                </div>
                            </div>
                            @if($errors->has('pin'))
                                <span class="errors">
                            {{ $errors->first('pin') }}
                        </span>
                            @endif
                            <div class="form-group">
                                <label for="txtseri" class="col-lg-2 control-label">Số seri</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="txtseri" name="seri"
                                           placeholder="Số seri" data-toggle="tooltip" data-title="Mã seri nằm sau thẻ">
                                </div>
                            </div>
                            @if($errors->has('seri'))
                                <span class="errors">
                            {{ $errors->first('seri') }}
                        </span>
                            @endif
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-primary" name="napthe">Nạp thẻ</button>
                                </div>
                            </div>
                            @if(session()->has('error'))
                                <h4 style="color: red">
                                    {{ session()->get('result.msg') }}
                                </h4>
                            @endif
                            @if(session()->has('success'))
                                <h4 style="color: green">
                                    Nạp thẻ thành công
                                </h4>
                                <h4 style="color: green">Dàn đề hôm nay là</h4>
                                <table class="table table-bordered table-striped list-dande">
                                    <tr>
                                        <th>Ngày</th>
                                        <th>Dàn lô</th>
                                        <th>Dàn đề</th>
                                    </tr>
                                    <tr>
                                        @php($array_dande_today = get_object_vars(session('dande_today')))
                                        <td>{{ date('d-m-Y', strtotime($array_dande_today['created_at'])) }}</td>
                                        <td>{{ $array_dande_today['so_lo'] }}</td>
                                        <td>{{ $array_dande_today['so_de'] }}</td>
                                    </tr>
                                </table>
                            @endif
                        </form>
                    @endif
                </div>
                <div class="right-form col-md-7 col-12">
                    <table class="table table-bordered table-striped list-dande">
                        <tr>
                            <th>Ngày</th>
                            <th>Dàn lô</th>
                            <th>Dàn đề</th>
                            <th>Kết quả lô</th>
                            <th>Kết quả đề</th>
                        </tr>
                        @foreach($dandes AS $dande)
                            <tr>
                                <td>{{ date('d-m-Y', strtotime($dande->created_at)) }}</td>
                                <td>{{ $dande->so_lo }}</td>
                                <td>{{ $dande->so_de }}</td>
                                <td>{{ $dande->result_lo }}</td>
                                <td>{{ $dande->result_de }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
