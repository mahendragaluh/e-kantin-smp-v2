@extends('section.panel')

@section('content')
    @auth
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Menu</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <button type="button" class="btn btn-success btn-block" data-toggle="modal"
                                    data-target="#modal-insert-menu">
                                    <i class="fa fa-plus"></i>
                                    Menu
                                </button>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <div class="modal fade" id="modal-insert-menu">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('store.menu') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h4 class="modal-title">Tambah Menu</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label" for="namaMenu">Nama Menu</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="namaMenu" name="nama_menu"
                                                value="" placeholder="Isi Nama Menu">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label" for="jenisMenu">Jenis Menu</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="jenisMenu" name="jenis_menu">
                                                <option>Jenis Menu</option>
                                                <option value="Makanan">Makanan</option>
                                                <option value="Minuman">Minuman</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label" for="hargaMenu">Harga Menu</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="hargaMenu" name="harga_menu"
                                                value="" placeholder="Isi Harga Menu">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label" for="fotoMenu">Foto Menu</label>
                                        <div class="col-sm-8 input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="fotoMenu" name="foto_menu">
                                                <label class="custom-file-label" for="fotoMenu">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label" for="statusMenu">Status Menu</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="statusMenu" name="status_menu" reset>
                                                <option>Status Menu</option>
                                                <option value="Tersedia">Tersedia</option>
                                                <option value="Habis">Habis</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <a class="btn btn-default" data-dismiss="modal">Close</a>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            @foreach ($menus as $menu)
                <div class="modal fade" id="modal-edit-menu-{{ $menu->id }}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="{{ route('update.menu', $menu->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Menu</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label" for="namaMenu">Nama Menu</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="namaMenu" name="nama_menu"
                                                    value="{{ $menu->nama_menu }}" placeholder="Isi Nama Menu">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label" for="jenisMenu">Jenis Menu</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" id="jenisMenu" name="jenis_menu">
                                                    <option>Jenis Menu</option>
                                                    <option value="Makanan" {{ $menu->jenis_menu == "Makanan" ? 'selected' : '' }}>Makanan</option>
                                                    <option value="Minuman" {{ $menu->jenis_menu == "Minuman" ? 'selected' : '' }}>Minuman</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label" for="hargaMenu">Harga Menu</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="hargaMenu" name="harga_menu"
                                                    value="{{ $menu->harga_menu }}" placeholder="Isi Harga Menu">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label" for="fotoMenu">Foto Menu</label>
                                            <div class="col-sm-8 input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="fotoMenu"
                                                        name="foto_menu">
                                                    <label class="custom-file-label" for="fotoMenu">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label" for="showFotoMenu"></label>
                                            <div class="col-sm-8 input-group">
                                                <img src="{{ asset('/assets/img/menu/' . $menu->foto_menu) }}" height="100%"
                                                    width="100%" alt="" srcset="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label" for="statusMenu">Status Menu</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" id="statusMenu" name="status_menu" reset>
                                                    <option>Status Menu</option>
                                                    <option value="Tersedia" {{ $menu->status_menu == "Tersedia" ? 'selected' : '' }}>Tersedia</option>
                                                    <option value="Habis" {{ $menu->status_menu == "Habis" ? 'selected' : '' }}>Habis</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <a class="btn btn-default" data-dismiss="modal">Close</a>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            @endforeach

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">View Data Menu</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="container w-full px-2 py-2 mx-auto col">
                                        <div class="grid lg:grid-cols-3 gap-y-5 row">
                                            @foreach ($menus as $menu)
                                                <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch flex-column">
                                                    <div class="card bg-light d-flex flex-fill">
                                                        <img class="card-img-top" style="height: 200px"
                                                            src="{{ asset('/assets/img/menu/' . $menu->foto_menu) }}"
                                                            alt="Dist Photo 3">
                                                        <div class="card-body pt-2">
                                                            <div class="row-md-2">
                                                                <div class="text-center">
                                                                    <h4 class=""><b>{{ $menu->nama_menu }}</b></h4>
                                                                    <h5 class="">{{ $menu->jenis_menu }}</h5>
                                                                    <h5 class="">Rp{{ $menu->harga_menu }}</h5>
                                                                    <h5 class="">{{ $menu->status_menu }}</h5>
                                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                                        action="{{ route('destroy.menu', $menu->id) }}"
                                                                        method="POST">
                                                                        <a href=""
                                                                            class="btn btn-sm btn-primary mb-1 mt-1"
                                                                            data-toggle="modal"
                                                                            data-target="#modal-edit-menu-{{ $menu->id }}">EDIT</a>
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-sm btn-danger mb-1 mt-1">HAPUS</button>
                                                                    </form>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    @endauth
@endsection
