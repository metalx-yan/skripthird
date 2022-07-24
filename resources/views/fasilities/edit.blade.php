@extends('main')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Edit Fasility</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-title">

        </div>
        <div class="card-body">
            <form action="{{ route('fasilities.update', $get->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Nama</label>
                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" value="{{ $get->name }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Kategori</label>
                        <select name="categori_id" id="" class="form-control" required>
                            <option value="">Select Kategori</option>
                            @foreach (App\Category::all() as $cat)
                                <option value="{{ $cat->id }}" {{$get->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('category_id', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Gambar</label>
                        <input type="file" name="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : ''}}" value="{{ $get->image }}" >
                        {!! $errors->first('image', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Deskripsi</label>
                        <input type="text" name="desc" class="form-control {{ $errors->has('desc') ? 'is-invalid' : ''}}" value="{{ $get->desc }}" required>
                        {!! $errors->first('desc', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Harga</label>
                        <input type="number" name="price" class="form-control {{ $errors->has('price') ? 'is-invalid' : ''}}" value="{{ $get->price }}" required>
                        {!! $errors->first('price', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Satuan</label>
                        <input type="number" name="satuan" class="form-control {{ $errors->has('satuan') ? 'is-invalid' : ''}}" value="{{ $get->satuan }}" required>
                        {!! $errors->first('satuan', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <a href="{{ route('fasilities.index') }}" class="btn btn-warning btn-sm">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
