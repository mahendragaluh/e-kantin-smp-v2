<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="/home" class="navbar-brand">
            <img src="{{ asset('/assets/img/logo-smp.png') }}" alt="Logo-SPENSASILA" class="brand-image"
                style="height: 50px">
            <span class="brand-text font-weight-light"><b>E-Kantin SPENSASILA</b></span>
        </a>

        {{-- <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> --}}

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            {{-- <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/home" class="nav-link">Home</a>
                </li>
            </ul> --}}
        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a id="dropdownKanan" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    class="nav-link dropdown-toggle">
                    <i class="far fa-user"></i>
                </a>
                <ul aria-labelledby="dropdownKanan" class="dropdown-menu border-0 shadow">
                    <li class="dropdown-divider"></li>

                    <li><a href="{{ route('logout') }}" class="dropdown-item"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <li class="dropdown-divider"></li>
                    <!-- End Level two -->
                </ul>
            </li>
        </ul>
    </div>
</nav>
<!-- /.navbar -->
