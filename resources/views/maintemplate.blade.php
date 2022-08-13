<!DOCTYPE html>
<html lang="en">
@include('templates._head')

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <div class="site-wrap">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div> <!-- .site-mobile-menu -->

        @include('templates._navbar')

        <div class="site-section" id="beranda">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <h1 class="text-white serif text-uppercase mb-4"><br></h1>
                        <p class="text-white mb-5"><br></p>
                        <p><a href="#" class="btn btn-white px-4 py-3"></a></p>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-10">
                        {{-- <img src="{{ asset('images/book_1.png') }}" alt="Image" class="img-fluid"> --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="site-section bg-light" id="design">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-7">
                        <h2 class="heading">Facility</h2>
                        {{-- <p>PT. Anugrah Distributor Indonesia adalah sebuah perusahaan care car dan cat semprot yang berlokasi di Jalan Prabu Kian Santang, Tangerang. Perusahaan ini memberikan penyediaan solusi dan layanan perangkat keras serta perangkat lunak tingkat operator yang inovatif. Yang membantu bisnis sepenuhnya mewujudkan janji teknologi dan membantu memaksimalkan nilai teknologi yang Anda butuhkan.</p> --}}
                    </div>
                </div>
                <h1>Indoor</h1>
                <div class="row">
                    @foreach (App\Fasility::where('category_id', 1)->get() as $item)
                        @if (is_null($item->booking))
                            <div class="col-md-4">
                                <div class="card" style="width: 18rem;">
                                    <img src="{{ asset($item->image) }}" class="card-img-top"
                                        style="display: block;
                        margin: 0 auto;width:80%"
                                        alt="...">
                                    <div class="card-body">
                                        <center>
                                            <h5 class="card-title">{{ $item->name }}</h5>
                                        </center>
                                        <p class="card-text">Harga : {{ $item->price }}</p>
                                        <p class="card-text">Deskripsi : {{ $item->desc }}</p>
                                        <!-- Button trigger modal -->
                                        <!-- Button trigger modal -->
                                        <p>
                                            <button class="btn btn-primary" type="button" data-toggle="collapse"
                                                data-target="#collapseExample{{ $item->id }}" aria-expanded="false"
                                                aria-controls="collapseExample">
                                                Booking
                                            </button>
                                        </p>
                                        <div class="collapse" id="collapseExample{{ $item->id }}">
                                            <div class="card card-body">
                                                <form action="{{ route('bookings.store') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                    <label for="">Tanggal</label>
                                                    {{-- <input id="date1"  placeholder="MM/DD/YYYY" data-input> --}}
                                                    <input id="date1" size="60" name="tanggal" type="date"
                                                        class="form-control" format="MM/DD/YYYY"
                                                        placeholder="MM/DD/YYYY" required />
                                                    <label for="">Bukti Pembayaran</label>
                                                    <input type="file" name="image" class="form-control" required
                                                        id="">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-sm">Submit</button>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <br>
                            </div>
                        @else
                            @if ($item->booking->status == '1')
                            @else
                                <div class="col-md-4">
                                    <div class="card" style="width: 18rem;">
                                        <img src="{{ asset($item->image) }}" class="card-img-top"
                                            style="display: block;
                                margin: 0 auto;width:80%"
                                            alt="...">
                                        <div class="card-body">
                                            <center>
                                                <h5 class="card-title">{{ $item->name }}</h5>
                                            </center>
                                            <p class="card-text">Harga : {{ $item->price }}</p>
                                            <p class="card-text">Deskripsi : {{ $item->desc }}</p>
                                            <!-- Button trigger modal -->
                                            <!-- Button trigger modal -->
                                            <p>
                                                <button class="btn btn-primary" type="button" data-toggle="collapse"
                                                    data-target="#collapseExample{{ $item->id }}"
                                                    aria-expanded="false" aria-controls="collapseExample">
                                                    Booking
                                                </button>
                                            </p>
                                            <div class="collapse" id="collapseExample{{ $item->id }}">
                                                <div class="card card-body">
                                                    <form action="{{ route('bookings.store') }}" method="post"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="id"
                                                            value="{{ $item->id }}">
                                                        <label for="">Tanggal</label>
                                                        {{-- <input id="date1"  placeholder="MM/DD/YYYY" data-input> --}}
                                                        <input id="date1" size="60" name="tanggal"
                                                            type="date" class="form-control" format="MM/DD/YYYY"
                                                            placeholder="MM/DD/YYYY" required />
                                                        <label for="">Bukti Pembayaran</label>
                                                        <input type="file" name="image" class="form-control"
                                                            required id="">
                                                        <button type="submit"
                                                            class="btn btn-primary btn-sm">Submit</button>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <br>
                                </div>
                            @endif
                        @endif
                    @endforeach
                </div>
                <h1>Outdoor</h1>
                <div class="row">
                    @foreach (App\Fasility::where('category_id', 2)->get() as $item)
                        {{-- <span>{{  }}</span> --}}
                        @if (is_null($item->booking))
                            <div class="col-md-4">
                                <div class="card" style="width: 18rem;">
                                    <img src="{{ asset($item->image) }}" class="card-img-top"
                                        style="display: block;
                        margin: 0 auto;width:80%"
                                        alt="...">
                                    <div class="card-body">
                                        <center>
                                            <h5 class="card-title">{{ $item->name }}</h5>
                                        </center>
                                        <p class="card-text">Harga : {{ $item->price }}</p>
                                        <p class="card-text">Deskripsi : {{ $item->desc }}</p>
                                        <!-- Button trigger modal -->
                                        <p>
                                            <button class="btn btn-primary" type="button" data-toggle="collapse"
                                                data-target="#collapseExample{{ $item->id }}"
                                                aria-expanded="false" aria-controls="collapseExample">
                                                Booking
                                            </button>
                                        </p>
                                        <div class="collapse" id="collapseExample{{ $item->id }}">
                                            <div class="card card-body">
                                                <form action="{{ route('bookings.store') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id"
                                                        value="{{ $item->id }}">
                                                    <label for="">Tanggal</label>
                                                    {{-- <input id="date1"  placeholder="MM/DD/YYYY" data-input> --}}
                                                    <input id="date1" size="60" name="tanggal"
                                                        type="date" class="form-control" format="MM/DD/YYYY"
                                                        placeholder="MM/DD/YYYY" required />
                                                    <label for="">Bukti Pembayaran</label>
                                                    <input type="file" name="image" class="form-control"
                                                        required id="">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-sm">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </div>
                        @else
                            @if ($item->booking->status == '1')
                            @else
                                <div class="col-md-4">
                                    <div class="card" style="width: 18rem;">
                                        <img src="{{ asset($item->image) }}" class="card-img-top"
                                            style="display: block;
                            margin: 0 auto;width:80%"
                                            alt="...">
                                        <div class="card-body">
                                            <center>
                                                <h5 class="card-title">{{ $item->name }}</h5>
                                            </center>
                                            <p class="card-text">Harga : {{ $item->price }}</p>
                                            <p class="card-text">Deskripsi : {{ $item->desc }}</p>
                                            <!-- Button trigger modal -->
                                            <p>
                                                <button class="btn btn-primary" type="button" data-toggle="collapse"
                                                    data-target="#collapseExample{{ $item->id }}"
                                                    aria-expanded="false" aria-controls="collapseExample">
                                                    Booking
                                                </button>
                                            </p>
                                            <div class="collapse" id="collapseExample{{ $item->id }}">
                                                <div class="card card-body">
                                                    <form action="{{ route('bookings.store') }}" method="post"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="id"
                                                            value="{{ $item->id }}">
                                                        <label for="">Tanggal</label>
                                                        {{-- <input id="date1"  placeholder="MM/DD/YYYY" data-input> --}}
                                                        <input id="date1" size="60" name="tanggal"
                                                            type="date" class="form-control" format="MM/DD/YYYY"
                                                            placeholder="MM/DD/YYYY" required />
                                                        <label for="">Bukti Pembayaran</label>
                                                        <input type="file" name="image" class="form-control"
                                                            required id="">
                                                        <button type="submit"
                                                            class="btn btn-primary btn-sm">Submit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
        </div>


        {{-- @include('templates._footer') --}}
        @include('templates._javascript')


    </div>

</body>
<script>
    const picker = document.getElementById('date1');
    picker.addEventListener('input', function(e) {
        var day = new Date(this.value).getUTCDay();
        if ([5, 4, 3, 2, 1].includes(day)) {
            e.preventDefault();
            this.value = '';
            alert('Weekdayxs not allowed');
        }
    });
</script>

</html>
