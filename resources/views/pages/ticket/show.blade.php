@extends('layouts.app')
@section('title', 'Detail Data Tiket')
@section('data.product', 'menu-open')
@section('ticket', 'active')
@section('content')
    <div class="content-wrapper" style="min-height: 1345.31px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Tiket</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('ticket.index') }}">Data Tiket</a></li>
                        <li class="breadcrumb-item active">Detail Data Tiket</li>
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
                        <h3 class="card-title">Detail Data Tiket</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: block;">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('ticket.update', $ticket->id) }}" method="post">
                                    @csrf @method('put')
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="title">Event</label>
                                            <input type="text" class="form-control  @error('title') is-invalid @enderror"
                                                id="title" placeholder="Masukan Nama" name="title"
                                                value="{{ old('title', $ticket->payment->event->title) }}" readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="title">Tanggal</label>
                                            <input type="text" class="form-control  @error('title') is-invalid @enderror"
                                                id="title" placeholder="Masukan Nama" name="title"
                                                value="{{ old('title', $ticket->payment->event->date) }}" readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="price">Harga</label>
                                            <input type="text" class="form-control  @error('price') is-invalid @enderror"
                                                id="price" placeholder="Masukan Nama" name="price"
                                                value="{{ old('price', $ticket->payment->event->price) }}" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="title">Tipe Event</label>
                                            <input type="text" class="form-control  @error('title') is-invalid @enderror"
                                                id="title" placeholder="Masukan Nama" name="title"
                                                value="{{ old('title', $ticket->payment->event->eventType->title) }}"
                                                readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="description">Deskripsi Event</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly>{{ $ticket->payment->event->description }}</textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="title">QR : </label><br>
                                            <img src="{{ asset('images/qr/' . $ticket->qr) }}" alt="" width="300"
                                                height="300">
                                        </div>
                                    </div>
                                    {{-- <a href="{{ route('payment.index', $ticket->id) }}" type="submit"
                                        class="btn btn-primary">Beli Tiket</a> --}}
                                </form>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
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
