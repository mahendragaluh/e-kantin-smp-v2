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
                            <h1 class="m-0">Users</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <button type="button" class="btn btn-success btn-block" data-toggle="modal"
                                    data-target="#modal-membuat-user">
                                    <i class="fa fa-plus"></i>
                                    User
                                </button>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <div class="modal fade" id="modal-membuat-user">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('create.users') }}">
                            @csrf
                            <div class="modal-header">
                                <h4 class="modal-title">Membuat User</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="col-sm-12 col-form-label" for="ID_Level">Jenis Level</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" id="ID_Level" name="level_id">
                                                <option>Jenis Level</option>
                                                <option value="1">Administrator</option>
                                                <option value="2">Kasir</option>
                                                <option value="3">Waiter</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12 col-form-label" for="NamaLengkap">Nama Lengkap</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="NamaLengkap" name="name"
                                                value="" placeholder="Isi Nama Lengkap">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12 col-form-label" for="UserName">Username</label>
                                        <div class="col-sm-12">
                                            <input type="username" class="form-control" id="UserName" name="username"
                                                value="" placeholder="Isi Username">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12 col-form-label" for="Email">Email</label>
                                        <div class="col-sm-12">
                                            <input type="email" class="form-control" id="Email" name="email"
                                                value="" placeholder="Isi Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12 col-form-label" for="Password">Password</label>
                                        <div class="col-sm-12">
                                            <input type="password" class="form-control" id="Password" name="password"
                                                placeholder="Isi Password">
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

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">View Data Users</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="datatabel-users" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="width: 7%">No.</th>
                                                    <th style="width: 7%">ID User</th>
                                                    <th style="width: 15%">Username</th>
                                                    <th style="width: 15%">Password</th>
                                                    <th style="width: 15%">Nama User</th>
                                                    <th style="width: 7%">ID Level</th>
                                                    <th >Foto</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $user->id }}</td>
                                                        <td>{{ $user->username }}</td>
                                                        <td></td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->level_id }}</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>ID User</th>
                                                    <th>Username</th>
                                                    <th>Password</th>
                                                    <th>Nama User</th>
                                                    <th>ID Level</th>
                                                    <th>Foto</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
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
    <!-- Page specific script -->
@endsection
