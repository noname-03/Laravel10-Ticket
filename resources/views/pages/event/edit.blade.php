@extends('layouts.app')
@section('title', 'Perbarui Data Event')
@section('data.product', 'menu-open')
@section('event', 'active')
@section('content')
    <div class="content-wrapper" style="min-height: 1345.31px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Event</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('event.index') }}">Data Event</a></li>
                        <li class="breadcrumb-item active">Perbarui Data Event</li>
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
                        <h3 class="card-title">Perbarui Data Event</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: block;">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('event.update', $event->id) }}" method="post">
                                    @csrf @method('put')
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="event_type_id">Tipe Event</label>
                                            <select class="form-control selectpicker" name="event_type_id"
                                                data-live-search="true" @error('event_type_id') is-invalid @enderror>
                                                @foreach ($eventTypes as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $event->event_type_id == $item->id ? 'selected' : '' }}>
                                                        {{ $item->title }}</option>
                                                @endforeach
                                            </select>
                                            @error('event_type_id')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="title">Nama</label>
                                            <input type="text" class="form-control  @error('title') is-invalid @enderror"
                                                id="title" placeholder="Masukan Nama" name="title"
                                                value="{{ old('title', $event->title) }}">
                                            @error('title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="date">Tanggal</label>
                                            <input type="date" class="form-control  @error('date') is-invalid @enderror"
                                                id="date" placeholder="Masukan Nama" name="date"
                                                value="{{ old('date', $event->date) }}">
                                            @error('date')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="price">Harga</label>
                                            <input type="number" class="form-control  @error('price') is-invalid @enderror"
                                                id="price" placeholder="Masukan Nama" name="price"
                                                value="{{ old('price', $event->price) }}">
                                            @error('price')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="description">Deskripsi</label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3"
                                                name="description">{{ $event->description }}</textarea>
                                            @error('description')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Perbarui Data</button>
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
