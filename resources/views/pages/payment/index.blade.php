@extends('layouts.app')
@section('title', 'Data Tipe Event')
@section('data.product', 'menu-open')
@section('event.type', 'active')
@push('css')
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endpush
@section('content')
    <<!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Invoice</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Pembayaran</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <!-- Main content -->
                            <div class="invoice p-3 mb-3">
                                <!-- title row -->
                                <div class="row">
                                    <div class="col-12">
                                        <h4>
                                            <i class="fas fa-globe"></i> Tiket, Inc.
                                            <small class="float-right">Date: {{ $dateNow }}</small>
                                        </h4>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- info row -->
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        <b>Invoice #007612</b><br>
                                        <br>
                                        <b>Order ID:</b> 4F3S8J<br>
                                        <b>Payment Due:</b> {{ $dateNow }} <br>
                                        <b>Account:</b> 968-34567
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- Table row -->
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Event</th>
                                                    <th>Price</th>
                                                    <th>Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>{{ $event->title }}</td>
                                                    <td>{{ $event->price }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <!-- accepted payments column -->
                                    <div class="col-6">
                                        {{-- <p class="lead">Payment Methods:</p>
                                        <img src="../../dist/img/credit/visa.png" alt="Visa">
                                        <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                                        <img src="../../dist/img/credit/american-express.png" alt="American Express">
                                        <img src="../../dist/img/credit/paypal2.png" alt="Paypal"> --}}

                                        {{-- <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning
                                            heekya handango imeem
                                            plugg
                                            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                                        </p> --}}
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-6">
                                        <p class="lead">Amount Due {{ $dateNow }}</p>

                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <th>Total:</th>
                                                    <td>{{ $event->price }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- this row will not appear when printing -->
                                {{-- <div class="row no-print">
                                    <div class="col-12">
                                        <a href="invoice-print.html" rel="noopener" target="_blank"
                                            class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                                        <button type="button" class="btn btn-success float-right"><i
                                                class="far fa-credit-card"></i> Submit
                                            Payment
                                        </button>
                                        <button type="button" class="btn btn-primary float-right"
                                            style="margin-right: 5px;">
                                            <i class="fas fa-download"></i> Generate PDF
                                        </button>
                                    </div>
                                </div> --}}
                            </div>
                            <!-- /.invoice -->

                            <div class="callout callout-info">
                                <h5><i class="fas fa-info"></i> Pembayaran:</h5>

                                <form action="{{ route('payment.store', $event->id) }}" method="post">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="numberCard">Number Card</label>
                                            <input type="number"
                                                class="form-control  @error('numberCard') is-invalid @enderror"
                                                id="numberCard" placeholder="Masukan Number Card" name="numberCard"
                                                value="{{ old('numberCard') }}">
                                            @error('numberCard')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="expiry">Expiry</label>
                                            <input type="number"
                                                class="form-control  @error('expiry') is-invalid @enderror" id="expiry"
                                                placeholder="Masukan Number Card" name="expiry"
                                                value="{{ old('expiry') }}">
                                            @error('expiry')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="cvv">CVV</label>
                                            <input type="number" class="form-control  @error('cvv') is-invalid @enderror"
                                                id="cvv" placeholder="Masukan Number Card" name="cvv"
                                                value="{{ old('cvv') }}">
                                            @error('cvv')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Bayar</button>
                                </form>
                            </div>
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    @endsection

    @push('script')
        <!-- Page specific script -->
    @endpush
