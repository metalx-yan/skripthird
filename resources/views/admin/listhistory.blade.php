@extends('main')

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
                <form action="{{ route('searching') }}" method="post">
                    @csrf
                    <div class="row">

                        <div class="col-md-6">
                            <label for="">Tahun</label><br>
                            <select name="tahun" id="" class="form-control" required>
                                <option value=""></option>
                                <option value="2022">2022</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="">Bulan</label><br>
                            <select name="bulan" id="" class="form-control" required>
                                <option value=""></option>
                                <option value="1">01</option>
                                <option value="2">02</option>
                                <option value="3">03</option>
                                <option value="4">04</option>
                                <option value="5">05</option>
                                <option value="6">06</option>
                                <option value="7">07</option>
                                <option value="8">08</option>
                                <option value="9">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn">Search</button>
                </form>
                <hr>
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
                            @if ($item->status == '1')
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
    {{-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> --}}

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                dom: 'Bfrtip',
                buttons: ['print']
            });
        });
    </script>
@endsection
