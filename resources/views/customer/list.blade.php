@extends('main')

@section('links')
    <style>
        input[type=checkbox] {
            display: none;
        }

        .container img {
            /* margin: 100px; */
            transition: transform 0.25s ease;
            cursor: zoom-in;
            /* display: block;
            margin: auto; */
            
        }

        input[type=checkbox]:checked ~ label > img{
            transform: scale(10);
            cursor: zoom-out;
            
        }

        input[type=checkbox] {
            display: none;
        }

        .container1 img {
            /* margin: 100px; */
            transition: transform 0.25s ease;
            cursor: zoom-in;
            /* display: block;
            margin: auto; */
            
        }

        input[type=checkbox]:checked ~ label > img{
            transform: scale(10);
            cursor: zoom-out;
            
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">

        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Data Booking</li>
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
                            <th>Bukti Pembayaran</th>
                            <th>Deskripsi Fasilitas</th>
                            <th>Harga</th>
                            <th>Tanggal Booking</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all as $item)
                            @if (Auth::user()->id == $item->user_id)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->fasility->name }}</td>
                                    <td><div class="container1">
                                        <input type="checkbox" id="zoomCheck1">
                                        <label for="zoomCheck1">
                                            {{-- <img src="{{ asset($item->image) }}" alt="" width="50%"> --}}
                                            <img src="{{ asset($item->fasility->image) }}" alt="" width="50%"></td>
                                        </label>
                                    </div>
                                    <td>
                                        <div class="container">
                                            <input type="checkbox" id="zoomCheck">
                                            <label for="zoomCheck">
                                                <img src="{{ asset($item->image) }}" alt="" width="50%">
                                            </label>
                                        </div>
                                    </td>
                                    <td>{{ $item->fasility->desc }}</td>
                                    <td>{{ $item->fasility->price }}</td>
                                    <td>{{ Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                                    <td>
                                        @if ($item->status == '1')
                                            <button type="button" class="btn btn-success btn-sm">Approve</button>
                                        @elseif($item->status == '2')
                                            <button type="button" class="btn btn-danger btn-sm">Decline</button>
                                        @else
                                            <button type="button" class="btn btn-secondary btn-sm">On Progress</button>
                                        @endif
                                    </td>
                                </tr>
                            @endif
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
