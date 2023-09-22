@extends('layouts.app')
@section('title', 'Detail Data User')
@section('data.product', 'menu-open')
@section('ticket', 'active')
@section('content')
    <div class="content-wrapper" style="min-height: 1345.31px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Detail Data User</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section>


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Detail Data User</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: block;">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="" method="post">
                                    @csrf @method('put')
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Nama</label>
                                            <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                                id="name" placeholder="Masukan Nama" name="name"
                                                value="{{ old('name', $user->name) }}" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email">Nama</label>
                                            <input type="text" class="form-control  @error('email') is-invalid @enderror"
                                                id="email" placeholder="Masukan Nama" name="email"
                                                value="{{ old('email', $user->email) }}" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="role">Status Akun</label>
                                            <input type="text" class="form-control  @error('role') is-invalid @enderror"
                                                id="role" placeholder="Masukan Nama" name="role"
                                                value="{{ old('role', $user->role) }}" readonly>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>

                <div class="callout callout-info">
                    <h5>Apakah anda ingin merubah akun anda menjadi: @if ($user->role == 'promotor')
                            <span class="badge badge-danger">User</span>
                        @else
                            <span class="badge badge-success">Promotor</span>
                        @endif
                    </h5>
                    <a href="{{ route('user.role', $user->id) }}" class="btn btn-primary active" role="button"
                        aria-pressed="true">Rubah
                        Akun</a>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@push('script')
    <script src="{{ asset('admin/bs/dist/js/bootstrap-select.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('admin/bs/dist/css/bootstrap-select.css') }}">
@endpush
