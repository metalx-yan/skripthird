<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile">
            <!-- User profile image -->
            <div class="profile-img"> <img src=" https://component-creator.com/images/testimonials/defaultuser.png"
                    alt="user" /> </div>
            <!-- User profile text-->
            <br>
            <div class="profile-text"> <a href="#" role="button" aria-haspopup="true"
                    aria-expanded="true">{{ ucfirst(Auth::user()->name) }}<span class="caret"></span></a>
                <br>
            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                @if (Auth::user()->role->name == 'administrator')
                    <li class="nav-small-cap">PERSONAL</li>
                    <li>
                        <a class="" href="{{ url('/admin') }}" aria-expanded="false"><i
                                class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                    </li>
                    <li>
                        <a class="" href="{{ route('users.index') }}" aria-expanded="false"><i
                                class="mdi mdi-gauge"></i><span class="hide-menu">Account</span></a>
                    </li>
                    <li>
                        <a class="" href="{{ route('products.index') }}" aria-expanded="false"><i
                                class="mdi mdi-gauge"></i><span class="hide-menu">Product</span></a>
                    </li>
                    <li>
                        <a class="" href="{{ route('transaksis.index') }}" aria-expanded="false"><i
                                class="mdi mdi-gauge"></i><span class="hide-menu">Transaksi</span></a>
                    </li>
                    <li>
                        <a class="" href="{{ route('transaksis.summary') }}" aria-expanded="false"><i
                                class="mdi mdi-gauge"></i><span class="hide-menu">Laporan Transaksi</span></a>
                    </li>
                @endif


                @if (Auth::user()->role->name == 'member')
                    <li class="nav-small-cap">PERSONAL</li>
                    <li>
                        <a class="" href="{{ url('/customer') }}" aria-expanded="false"><i
                                class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                    </li>
                    <li>
                        <a class="" href="{{ route('customer.lists') }}" aria-expanded="false"><i class="mdi mdi-gauge"></i><span
                                class="hide-menu">Lists Booking</span></a>
                    </li>
                @endif

                @if (Auth::user()->role->name == 'produksi')
                    <li class="nav-small-cap">PERSONAL</li>

                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false"><i
                                class="mdi mdi-account-outline"></i><span class="hide-menu">Master Data</span></a>
                        <ul aria-expanded="true" class="collapse">
                            <li><a href="{{ route('spbspk') }}">Data Proses Retur</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
</aside>

{{-- <li>
            <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-widgets"></i><span class="hide-menu">Widgets</span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="widget-apps.html">Widget Apps</a></li>
                <li><a href="widget-data.html">Widget Data</a></li>
                <li><a href="widget-charts.html">Widget Charts</a></li>
            </ul>
        </li> --}}

{{-- <li>
            <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-book-multiple"></i><span class="hide-menu">Page Layout</span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="layout-single-column.html">1 Column</a></li>
                <li><a href="layout-fix-header.html">Fix header</a></li>
                <li><a href="layout-fix-sidebar.html">Fix sidebar</a></li>
                <li><a href="layout-fix-header-sidebar.html">Fixe header &amp; Sidebar</a></li>
                <li><a href="layout-boxed.html">Boxed Layout</a></li>
                <li><a href="layout-logo-center.html">Logo in Center</a></li>
            </ul>
        </li> --}}
