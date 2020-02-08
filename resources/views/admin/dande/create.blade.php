@extends('admin.layouts.main')
@section('title', 'Dàn đề')
@section('content')
    <!-- Main content -->
    <section class="content">
        <h1>Thêm mới dàn đề</h1>
        <form method="post" action="{{ url('admin/dande/store') }}" enctype="multipart/form-data">
            @csrf
            <span class="errors">
                Các số ngăn cách nhau bởi dấu ";"
            </span>
            <div class="form-group">
                <label>Dàn lô</label>
                <textarea name="so_lo" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>Dàn đề</label>
                <textarea name="so_de" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="submit" value="Lưu"/>
                <a class="btn btn-secondary" href="{{ url('/admin/dande/index') }}">
                    Quay lại
                </a>
            </div>
        </form>

    </section>
    <!-- /.content -->
    </div>
@endsection
