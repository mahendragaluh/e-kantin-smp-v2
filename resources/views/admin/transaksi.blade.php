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
                                <li class="breadcrumb-item"><a href="/dashboard-admin">Dashboard</a></li>
                                <li class="breadcrumb-item active">Pengguna</li>
                                <li class="breadcrumb-item active">Users</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

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
                                    <table id="datatabel-users" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 7%">No.</th>
                                                <th style="width: 20%">ID Level</th>
                                                <th style="width: 25%">Nama Level</th>
                                                <th style="width: 25%">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            {{-- @foreach ($levels as $level)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $level->id }}</td>
                                                    <td>{{ $level->name_level }}</td>
                                                    <td>
                                                        <a href="" class="btn btn-sm btn-primary" data-toggle="modal"
                                                            data-target="#modal-edit-{{ $level->id }}">
                                                            <i class="fa fa-edit"></i>
                                                            Edit
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach --}}
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th style="width: 7%">No.</th>
                                                <th style="width: 20%">ID Level</th>
                                                <th style="width: 25%">Nama Level</th>
                                                <th style="width: 25%">Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
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
