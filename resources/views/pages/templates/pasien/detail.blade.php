@extends('layouts.main')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('pasien') }}">Data {{ $title }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Data {{ $title }}</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between border-bottom">
                        <h1 class="h2 mb-3" >Detail Data {{ $title }}</h1>
                        <div>
                            <a href="{{ route('pasien') }}" class="btn btn-dark">Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td style="width: 300px;" >Nama</td>
                                    <td style="width: 20px;" >:</td>
                                    <td>{{ $data->name }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 300px;" >Email</td>
                                    <td style="width: 20px;" >:</td>
                                    <td>{{ $data->email }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 300px;" >No. Telepon</td>
                                    <td style="width: 20px;" >:</td>
                                    <td>{{ $data->phone }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 300px;" >Tanggal</td>
                                    <td style="width: 20px;" >:</td>
                                    <td>{{ $data->created_at }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 300px;" >Alamat</td>
                                    <td style="width: 20px;" >:</td>
                                    <td>{{ $data->address }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 300px;" >Foto KTP</td>
                                    <td style="width: 20px;" >:</td>
                                    <td>
                                        @if (!$data->foto_ktp)
                                            <span class="fst-italic">Belum Upload KTP</span>
                                        @else
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#foto_ktp">
                                                Lihat Foto KTP
                                            </button>
                                        @endif
                                    </td>
                                    {{-- <td>{{ $data->foto_ktp}}</td> --}}
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="foto_ktp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Foto KTP</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <img width="100%" src="{{ asset('storage/pasien/' . $data->foto_ktp ) }}" alt="">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
        </div>
    </div>
</div>
@endsection
