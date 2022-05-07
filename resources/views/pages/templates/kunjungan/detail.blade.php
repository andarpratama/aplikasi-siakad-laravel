@extends('layouts.main')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin') }}">Data {{ $title }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Data {{ $title }}</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between border-bottom">
                        <h1 class="h2 mb-3" >Detail Data</h1>
                        <div>
                            <a href="{{ route('kunjungan.edit', $data->id) }}" class="btn btn-success px-4">Edit</a>
                            <button type="button" onclick="window.history.go(-1); return false;" class="btn btn-dark">Kembali</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="h3 mb-3">Detail Kunjungan</h5>
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td style="width: 300px;" >No. Kunjungan</td>
                                    <td style="width: 20px;" >:</td>
                                    <td>{{ $data->no_kunjungan }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 300px;" >Pasien</td>
                                    <td style="width: 20px;" >:</td>
                                    <td class="text-capitalize" >{{ $data->user->name }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 300px;" >Dokter</td>
                                    <td style="width: 20px;" >:</td>
                                    @if (!$data->dokter)
                                        <td class="fst-italic" >Belum ditentukan</td>
                                    @else
                                        <td>{{ $data->dokter->nama }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td style="width: 300px;" >No. Antrian</td>
                                    <td style="width: 20px;" >:</td>
                                    @if (!$data->antrian)
                                        <td class="fst-italic" >Belum ditentukan</td>
                                    @else
                                        <td>{{ $data->antrian->no_antrian }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td style="width: 300px;" >Tanggal</td>
                                    <td style="width: 20px;" >:</td>
                                    <td>{{ $data->created_at }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 300px;" >Status</td>
                                    <td style="width: 20px;" >:</td>
                                    <td class="text-capitalize" >{{ $data->status }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 300px;" >Hasil</td>
                                    <td style="width: 20px;" >:</td>
                                    @if (!$data->hasil)
                                        <td class="text-capitalize fst-italic" >Belum ada hasil</td>
                                    @else
                                        <td class="text-capitalize" >{{ $data->hasil }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td style="width: 300px;" >Bukti Transfer</td>
                                    <td style="width: 20px;" >:</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bukti_transfer">
                                            Lihat Bukti Transfer
                                        </button>
                                    </td>
                                    {{-- <td>{{ $data->foto_ktp}}</td> --}}
                                </tr>
                            </tbody>
                        </table>

                        <h5 class="h3 mb-3 mt-5">Detail Paket</h5>
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td style="width: 300px;" >Paket</td>
                                    <td style="width: 20px;" >:</td>
                                    <td>{{ $data->paket->nama }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 300px;" >Harga</td>
                                    <td style="width: 20px;" >:</td>
                                    <td>Rp {{ number_format($data->paket->harga, 0, ",", ".")  }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<div class="modal fade" id="bukti_transfer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Bukti Transfer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <img width="100%" id="image" src="{{ asset('storage/' . $data->bukti ) }}" alt="">
            <img width="100%" id="image" src="" alt="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
@endsection
