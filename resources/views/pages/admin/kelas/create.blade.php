@extends('layouts.main')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="">Data {{ $title }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Data {{ $title }}</li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between border-bottom">
                            <h1 class="h2 mb-3">Tambah Data {{ $title }}</h1>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="kode" class="form-label">Kode Kelas</label>
                                    <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode"
                                        name="kode" value="{{ old('kode') }}">
                                    @error('kode')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="ruangan_id" class="form-label">Ruangan</label>
                                    <select name="ruangan_id" class="form-select" aria-label="Default select example">
                                        <option selected disabled>Pilih Ruangan</option>
                                        <option value="1">Ruangan 1</option>
                                        <option value="2">Ruangan 2</option>
                                        <option value="3">Ruangan 3</option>
                                    </select>
                                    @error('ruangan_id')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="guru_id" class="form-label">Wali Kelas</label>
                                    <select name="guru_id" class="form-select" aria-label="Default select example">
                                        <option selected disabled>Pilih Guru</option>
                                        <option value="1">Guru 1</option>
                                        <option value="2">Guru 2</option>
                                        <option value="3">Guru 3</option>
                                    </select>
                                    @error('guru_id')
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
