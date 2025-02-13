@extends('admin.layouts.main')
@section('title', 'Create card')
@section('content')
    <!-- Main content -->
    <section class="content">
        <h1>Thêm thẻ mới</h1>
        @if(session()->has('error'))
            <h3 style="color: red">
                {{ session()->get('result.msg') }}
            </h3>
        @endif
        <form method="post" action="{{ url('admin/cards/store') }}" enctype="multipart/form-data">
            @csrf
{{--            @if($errors->has('error'))--}}
{{--            echo '<script>alert("' . $error . '!");</script>';}--}}
{{--            @endif--}}
            <div class="form-group">
                <label>Pin</label>
                <input type="number" name="pin" value="{{ old('pin') }}" class="form-control"/>
            </div>
            @if($errors->has('pin'))
                <span class="errors">
                    {{ $errors->first('pin') }}
                </span>
            @endif
            <div class="form-group">
                <label>Seri</label>
                <input type="number" name="seri" value="{{ old('seri') }}" class="form-control"/>
            </div>
            @if($errors->has('seri'))
                <span class="errors">
                    {{ $errors->first('seri') }}
                </span>
            @endif
            <div class="form-group">
                <label>Mệnh giá</label>
                <p>200.000đ</p>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="submit" value="Lưu"/>
                <a class="btn btn-secondary" href="{{ url('/admin/index') }}">
                    Quay lại
                </a>
            </div>
        </form>

    </section>
    <!-- /.content -->
    </div>
@endsection
