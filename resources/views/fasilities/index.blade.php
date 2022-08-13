@extends('main')

@section('content')
    <div class="container-fluid">

        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Data Fasility</li>
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
                <a href="{{ route('fasilities.create') }}" class="btn btn-primary btn-sm">Tambah Fasility</a>
                <br>
                <br>
                <table class="table border" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Gambar</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            {{-- <th>Satuan</th> --}}
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td><img src="{{ asset($item->image) }}" alt="" width="50%"></td>
                                <td>{{ $item->desc }}</td>
                                <td>{{ $item->price }}</td>
                                {{-- <td>{{ $item->satuan }}</td> --}}
                                <td>
                                    <div class="row">
                                        @if (is_null($item->booking))
                                        @else
                                            @if ($item->booking->status == '1')
                                                <div class="col-md-2">
                                                    {{-- <a href="{{ route('admin.restore', $item->id ) }}" class="btn btn-warning btn-sm">Restore</a> --}}
                                                    <form action="{{ route('admin.restore', $item->id) }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-primary btn-sm"
                                                            onclick="return confirm('Are you sure you want to Restore?');">Restore</button>
                                                    </form>
                                                </div>
                                            @else
                                            @endif
                                        @endif
                                        <div class="col-md-3"></div>
                                        <div class="col-md-2">
                                            <a href="{{ route('fasilities.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <form action="{{ route('fasilities.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to Remove?');">Delete</button>
                                            </form>
                                        </div>
                                    </div>
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
