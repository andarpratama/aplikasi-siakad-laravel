@extends('layouts.main')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data {{ $title }}</li>
                    <li class="breadcrumb-item active" aria-current="page">Ubah Data {{ $title }}</li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between border-bottom">
                            <h1 class="h2 mb-3">Ubah Data {{ $title }}</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.ruangan.update', $data->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="kode_ruangan" class="form-label">Kode Ruangan</label>
                                    <input type="text" class="form-control @error('kode_ruangan') is-invalid @enderror"
                                        id="kode_ruangan" name="kode_ruangan" value="{{ $data->kode_ruangan }}" readonly>
                                    @error('kode_ruangan')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" class="form-select @error('status') is-invalid @enderror"
                                        aria-label="Default select example">
                                        <option selected disabled>Pilih Status</option>
                                        <option value="terpakai" {{ $data->status == 'terpakai' ? 'selected' : '' }}>
                                            Terpakai</option>
                                        <option value="belum terpakai"
                                            {{ $data->status == 'belum terpakai' ? 'selected' : '' }}>Belum Terpakai
                                        </option>
                                        <option value="tidak aktif"
                                            {{ $data->status == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                    </select>
                                    @error('status')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="kapasitas" class="form-label">Kapasitas</label>
                                    <input type="number" class="form-control @error('kapasitas') is-invalid @enderror"
                                        id="kapasitas" name="kapasitas" value="{{ $data->kapasitas }}">
                                    @error('kapasitas')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
