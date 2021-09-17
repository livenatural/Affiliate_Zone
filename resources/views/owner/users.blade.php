@extends('layout')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Users</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
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
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>ID</th>
                          <th>USER EMAIL</th>
                          <th>LAST VISIT</th>
                          <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->EMAIL }}</td>
                                <td>{{ $user->updated_at }}</td>
                                <td>
                                    <a href="/owner/users/{{  $user->id }}/block" class="btn btn-sm btn-primary">
                                        <i class="nav-icon fas fa-user-times"></i>
                                        @if ($user->BLOCK === 1)
                                            Unblock
                                        @else 
                                            Block
                                        @endif
                                    </a>
                                </td>
                          </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>USER EMAIL</th>
                            <th>LAST VISIT</th>
                            <th>ACTION</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

