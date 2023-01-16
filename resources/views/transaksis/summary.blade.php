@extends('main')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Data Transaksi</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-title">

        </div>
        @php
            $no = 1;
        @endphp
        <div class="card-body">
            <br>
            <br>
            <table class="table border" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Customer</th>
                        <th>Nama Produk</th>
                        <th>Kuantitas</th>
                        <th>Order</th>
                        <th>Sisa Stock</th>
                        <th>Harga</th>
                        <th>Total Order</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->customer }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->kuantitas }}</td>
                            <td>{{ $item->order }}</td>
                            <td>{{ $item->sisa_stock }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>{{ $item->total_order }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>

@endsection
