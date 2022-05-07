@extends('layouts.main')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('kunjungan.home') }}">Data {{ $title }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Data {{ $title }}</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between border-bottom">
                        <h1 class="h2 mb-3" >Tambah Data {{ $title }}</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('kunjungan.update', $data->id) }}" method="POST" >
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">No. Kunjungan</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->no_kunjungan }}" readonly >
                                @error('nama')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="pasien_id" class="form-label">Pasien</label>
                                <input type="text" class="form-control @error('pasien_id') is-invalid @enderror" id="pasien_id" name="pasien_id" value="{{ $data->user->name }}" readonly >
                                @error('pasien_id')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="dokter_id" class="form-label">Dokter</label>
                                <select class="form-select" name="dokter_id" id="dokter_id" aria-label="Default select example">
                                    <option selected disabled >-- Pilih Dokter --</option>
                                    @foreach ($dokters as $dokter)
                                        <option value="{{ $dokter->id }}" {{ $dokter->id == $data->dokter_id ? 'selected' : '' }} >{{ $dokter->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="paket_id" class="form-label">Paket</label>
                                <select class="form-select" name="paket_id" id="paket_id" aria-label="Default select example">
                                    <option selected disabled >-- Pilih Paket --</option>
                                    @foreach ($pakets as $paket)
                                        <option value="{{ $paket->id }}" {{ $paket->id == $data->paket_id ? 'selected' : '' }} >{{ $paket->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="mb-3">
                                <label for="antrian_id" class="form-label">No. Antrian</label>
                                <select class="form-select" name="antrian_id" id="antrian_id" aria-label="Default select example">
                                    <option selected disabled >-- Pilih Antrian --</option>
                                    @foreach ($antrians as $antrian)
                                        <option value="{{ $antrian->id }}" {{ $antrian->id == $data->antrian_id ? 'selected' : '' }} >{{ $antrian->nama }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" name="status" id="status" aria-label="Default select example">
                                    <option selected disabled >-- Pilih Status --</option>
                                    <option value="pending" {{ $data->status == 'pending' ? 'selected' : '' }} >Pending</option>
                                    <option value="paid" {{ $data->status == 'paid' ? 'selected' : '' }} >Paid</option>
                                    <option value="selesai" {{ $data->status == 'selesai' ? 'selected' : '' }} >selesai</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="hasil" class="form-label">Hasil</label>
                                <select class="form-select" name="hasil" id="hasil" aria-label="Default select example">
                                    <option selected disabled >-- Pilih Status --</option>
                                    <option value="positif" {{ $data->hasil == 'positif' ? 'selected' : '' }} >Positif</option>
                                    <option value="positif" {{ $data->hasil == 'negatif' ? 'selected' : '' }} >Negatif</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" onclick="window.history.go(-1); return false;" class="btn btn-dark">Kembali</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection
