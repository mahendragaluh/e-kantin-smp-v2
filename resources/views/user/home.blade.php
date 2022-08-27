@extends('layouts.user.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">

                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">

                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 order-2">
                        <div class="row mb-5">
                            @foreach ($menus as $menu)
                                <div class="col-6 col-sm-6 col-lg-4 mb-1" data-aos="fade-up">
                                    <div class="card text-center border">
                                        <img class="card-img-top" style="height: 150px"
                                            src="{{ asset('/assets/img/menu/' . $menu->foto_menu) }}" alt="Foto Menu">
                                        <div class="card-body pt-2">
                                            <div class="row-md-2">
                                                <div class="text-center">
                                                    <span class=""><b>{{ $menu->nama_menu }}</b></span> <br>
                                                    <span class="">{{ $menu->jenis_menu }}</span> <br>
                                                    <span
                                                        class="">Rp{{ number_format($menu->harga_menu, 2, ',', '.') }}</span>
                                                    <br>
                                                    @if ($menu->stok_menu == 0)
                                                        <span class="badge bg-danger">Habis</span> <br>
                                                        <button type="submit" class="btn btn-primary mt-2"
                                                            disabled>Pesan</button>
                                                    @else
                                                        <span class="">Stok {{ $menu->stok_menu }}</span>
                                                        <form action="{{ route('user.keranjang.simpan') }}" method="post">
                                                            @csrf
                                                            @if (Route::has('login'))
                                                                @auth
                                                                    <input type="hidden" name="user_id"
                                                                        value="{{ Auth::user()->id }}">
                                                                @endauth
                                                            @endif
                                                            <input type="hidden" name="menu_id"
                                                                value="{{ $menu->id }}">
                                                            <input type="hidden" name="qty" value="1">
                                                            <button type="submit"
                                                                class="btn btn-primary mt-2">Pesan</button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row" data-aos="fade-up">
                            <div class="col-md-12 text-right">
                                <div class="site-block-27">
                                    {{-- {{ $produks->links() }} --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 order-1 mb-5 mb-md-0">
                        <div class="border p-4 rounded mb-4">
                            <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
                            <ul class="list-unstyled mb-0">
                                {{-- @foreach ($categories as $categori) --}}
                                <li class="mb-1"><a href="" class="d-flex"><span></span> <span
                                            class="text-black ml-auto">A</span></a>
                                </li>
                                {{-- @endforeach --}}
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
