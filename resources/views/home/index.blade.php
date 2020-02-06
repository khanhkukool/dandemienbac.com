@extends('layouts.main')
@section('content')
    <div class="header">
        <div class="container">
            <div class="header-logo">
                <a class="logo" href="{{ url('/index') }}">
                    <img src="{{ url('assets/img/logo-web-napthengay.png') }}" alt="">
                </a>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="left-form col-md-5 col-12">
                    <form class="form-horizontal form-napthengay" role="form" method="post" action="transaction.php">
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
                                <input type="text" class="form-control" id="txtpin" name="txtpin" placeholder="Mã thẻ" data-toggle="tooltip" data-title="Mã số sau lớp bạc mỏng"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtseri" class="col-lg-2 control-label">Số seri</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="txtseri" name="txtseri" placeholder="Số seri" data-toggle="tooltip" data-title="Mã seri nằm sau thẻ">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button type="submit" class="btn btn-primary" name="napthe">Nạp thẻ</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="right-form col-md-7 col-12">
                    <table class="table table-bordered table-striped list-dande">
                        <tr>
                            <th>Ngày</th>
                            <th>Dàn lô</th>
                            <th>Dàn đề</th>
                            <th>Kết quả</th>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>04/01/2020</td>
                            <td>23;34;52;53</td>
                            <td>23;34;52;53</td>
                            <td>23</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
