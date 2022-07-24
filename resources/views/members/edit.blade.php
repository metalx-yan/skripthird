@extends('main')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Edit Member</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-title">

        </div>
        <div class="card-body">
            <form action="{{ route('members.update', $get->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <label for="">NIK</label>
                        <input type="text" name="nik" class="form-control {{ $errors->has('nik') ? 'is-invalid' : ''}}" value="{{ $get->nik }}" required>
                        {!! $errors->first('nik', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" value="{{ $get->name }}" >
                        {!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" value="{{ $get->email }}" required>
                        {!! $errors->first('email', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Telp</label>
                        <input type="text" name="telp" class="form-control {{ $errors->has('telp') ? 'is-invalid' : ''}}" value="{{ $get->telp }}" required>
                        {!! $errors->first('telp', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" class="form-control {{ $errors->has('alamat') ? 'is-invalid' : ''}}" value="{{ $get->alamat }}" required>
                        {!! $errors->first('alamat', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <a href="{{ route('members.index') }}" class="btn btn-warning btn-sm">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
