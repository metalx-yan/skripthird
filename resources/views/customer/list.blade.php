@extends('main')

@section('content')
    <div class="container-fluid">

        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Data Bookong</li>
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
                <table class="table border" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Fasilitas</th>
                            <th>Gambar Fasilitas</th>
                            <th>Deskripsi Fasilitas</th>
                            <th>Harga</th>
                            <th>Tanggal Booking</th>
                            <th>Bukti Pembayaran</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->fasility->name }}</td>
                                <td><img src="{{ asset($item->fasility->image) }}" alt="" width="50%"></td>
                                <td>{{ $item->fasility->desc }}</td>
                                <td>{{ $item->fasility->price }}</td>
                                <td>{{ Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                                <td><img src="{{ asset($item->image) }}" alt="" width="50%"></td>
                                <td>
                                    @if ($item->status == '1')
                                        <button type="button" class="btn btn-success btn-sm">Approve</button>
                                    @elseif($item->status == '2')
                                        <button type="button" class="btn btn-danger btn-sm">Decline</button>
                                    @else
                                        <div class="row">
                                            <div class="col-md-3">
                                                <form action="{{ route('customer.lists.approve', $item->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" value="1" name="status">
                                                    <button type="submit" class="btn btn-success btn-sm"
                                                        onclick="return confirm('Are you sure you want to Approve?');">Approve</button>
                                                </form>
                                            </div>
                                            <div class="col-md-4"></div>
                                            <div class="col-md-2">
                                                <form action="" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure you want to Decline?');">Decline</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                </td>
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
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection