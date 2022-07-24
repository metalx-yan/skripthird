@extends('main')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Ubah Peminjaman</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-title">

        </div>
        <div class="card-body">
            <form action="{{ route('peminjamans.update', $get->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <label for="">No Pinjam</label>
                        <input type="text" name="no" class="form-control {{ $errors->has('no') ? 'is-invalid' : ''}}" required value="{{ $get->no }}">
                        {!! $errors->first('no', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Tanggal Pinjam</label>
                        <input type="date" name="tanggal" class="form-control {{ $errors->has('tanggal') ? 'is-invalid' : ''}}" value="{{ $get->tanggal }}" required>
                        {!! $errors->first('tanggal', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Fasility</label>
                        <select name="fasility_id" id="" class="form-control" required>
                            <option value="">Select Fasility</option>
                            @foreach (App\Fasility::all() as $item)
                                <option value="{{ $item->id }}" {{ $get->fasility_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('fasility_id', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Lama Pinjam</label>
                        <input type="text" name="lama" class="form-control {{ $errors->has('lama') ? 'is-invalid' : ''}}" required value="{{ $get->lama }}">
                        {!! $errors->first('lama', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Status</label>
                        <select name="status" class="form-control" id="" required>
                            <option value="">Select Status</option>
                            <option value="1" {{ $get->status == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $get->status == '0' ? 'selected' : '' }}>Nggak Active</option>
                        </select>
                        {!! $errors->first('status', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Keterangan</label>
                        <textarea name="keterangan" id="" cols="30" rows="3" class="form-control">{{ $get->keterangan }}</textarea>
                        {!! $errors->first('keterangan', '<span class="invalid-feedback">:message</span>') !!}
                    </div>

                </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <a href="{{ route('peminjamans.index') }}" class="btn btn-warning btn-sm">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
