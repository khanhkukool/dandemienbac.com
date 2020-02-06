@extends('admin.layouts.main')
@section('title', 'Create card')
@section('content')
    <!-- Main content -->
    <section class="content">
        <h1>Thêm mới sản phẩm</h1>
        <form method="post" action="{{ url('admin/cards/store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Pin</label>
                <input type="number" name="pin" value="{{ old('pin') }}" class="form-control" />
            </div>
            <div class="form-group">
                <label>Seri</label>
                <input type="number" name="seri" value="{{ old('seri') }}" class="form-control" />
            </div>
            <div class="form-group">
                <label>Mệnh giá</label>
                <p>200.000đ</p>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="submit" value="Lưu" />
                <a class="btn btn-secondary" href="{{ url('/admin/index') }}">
                    Quay lại
                </a>
            </div>
        </form>

    </section>
    <!-- /.content -->
    </div>
@endsection
