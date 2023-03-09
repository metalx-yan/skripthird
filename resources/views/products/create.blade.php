@extends('main')

@section('content')
    <div class="container-fluid">

        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Buat Product</li>
                </ol>
            </div>
        </div>

        <div class="card">
            <div class="card-title">

            </div>
            <div class="card-body">
                <form action="{{ route('products.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Nama</label>
                            <input type="text" name="name"
                                class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" required>
                            {!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
                        </div>
                        <div class="col-md-3">
                            <label for="">Kuantitas</label>
                            <input type="text" name="kuantitas"
                                class="form-control {{ $errors->has('kuantitas') ? 'is-invalid' : '' }}" required>
                            {!! $errors->first('kuantitas', '<span class="invalid-feedback">:message</span>') !!}
                        </div>
                        <div class="col-md-3">
                            <label for="">Harga</label>
                            <input type="text" name="harga" id="aaaa"
                                class="form-control {{ $errors->has('harga') ? 'is-invalid' : '' }}" required>
                            {!! $errors->first('harga', '<span class="invalid-feedback">:message</span>') !!}
                        </div>
                 

                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <a href="{{ route('products.index') }}" class="btn btn-warning btn-sm">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        function updateTextView(_obj) {
            var num = getNumber(_obj.val());
            if (num == 0) {
                _obj.val('');
            } else {
                _obj.val(num.toLocaleString());
            }
        }

        function getNumber(_str) {
            var arr = _str.split('');
            var out = new Array();
            for (var cnt = 0; cnt < arr.length; cnt++) {
                if (isNaN(arr[cnt]) == false) {
                    out.push(arr[cnt]);
                }
            }
            return Number(out.join(''));
        }
        $(document).ready(function() {
            $('#aaaa').on('keyup', function() {
                updateTextView($(this));
            });
        });
    </script>
@endsection
