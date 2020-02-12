@extends('admin.layouts.main')
@section('title', 'Dàn đề')
@section('content')
    <!-- Main content -->
    <section class="content">
        <h1>Sửa dàn đề</h1>
        <form method="post" action="{{ url('admin/dande/update',['id' => $dandes->id]) }}" enctype="multipart/form-data">
            @csrf
            <span class="errors">
                Các số ngăn cách nhau bởi dấu ";"
            </span>
            <div class="form-group">
                <label>Dàn lô</label>
                <textarea name="so_lo" class="form-control">{{ old('so_lo') ? old('so_lo') : $dandes->so_lo }}</textarea>
            </div>
            <div class="form-group">
                <label>Dàn đề</label>
                <textarea name="so_de" class="form-control">{{ old('so_de') ? old('so_de') : $dandes->so_de }}</textarea>
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
