@extends('layouts.main')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data {{ $title }}</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between border-bottom">
                        <h1 class="h2 mb-3" >Data {{ $title }}</h1>
                        <div>
                            {{-- <a href="{{ route('dokter.create') }}" class="btn btn-primary"><i class="align-middle me-2" data-feather="file-plus"></i>Data {{ $title }}</a> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <table class="table table-bordered table-striped" id="dataTable" >
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center" >No</th>
                                    <th scope="col">No. Kunjungan</th>
                                    <th scope="col">Pasien</th>
                                    <th scope="col">Paket</th>
                                    <th scope="col">Antrian</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Hasil</th>
                                    <th scope="col" class="text-center" >Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kunjungan as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->no_kunjungan }}</td>
                                        <td class="text-capitalize" >{{ $data->user->name }}</td>
                                        <td>{{ $data->paket->nama }}</td>
                                        @if (!$data->antrian)
                                            <td class="fst-italic text-secondary" >Belum ditentukan</td>
                                        @else
                                            <td>{{ $data->antrian->no_antrian }}</td>
                                        @endif
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary text-capitalize dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                  {{ $data->status }}
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                  <li><a class="dropdown-item" href="{{ route('kunjungan.setstatus', ['id' => $data->id, 'status' => 'pending']) }}">Pending</a></li>
                                                  <li><a class="dropdown-item" href="{{ route('kunjungan.setstatus', ['id' => $data->id, 'status' => 'paid']) }}">Paid</a></li>
                                                  <li><a class="dropdown-item" href="{{ route('kunjungan.setstatus', ['id' => $data->id, 'status' => 'selesai']) }}">Selesai</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            @if (!$data->hasil)
                                                <span class="fst-italic" >Belum ada hasil</span>
                                            @elseif ($data->hasil == "positif")
                                                <span class="text-danger text-capitalize fw-bold" >{{ $data->hasil }}</span>
                                            @elseif ($data->hasil == "negatif")
                                                <span class="text-primary text-capitalize fw-bold" >{{ $data->hasil }}</span>
                                            @endif
                                        </td>
                                        <td class="text-center" >
                                            <div class="btn-group" role="group"  >
                                                <button type="button" class="btn btn-danger btnDelete" data-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal" >Hapus</button>
                                                <a href="{{ route('kunjungan.edit', $data->id) }}" class="btn btn-success">Edit</a>
                                                <a href="{{ route('kunjungan.show', $data->id) }}" class="btn btn-warning">Detail</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Hapus data!</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Tetap hapus data ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <a href="income/{id}/delete" class="btn btn-danger btnFinalDelete">Hapus</a>
                                </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            let btnDeletes = document.querySelectorAll('.btnDelete');
                            for (let btnDelete of btnDeletes) {
                                btnDelete.addEventListener('click', function(){
                                    let btnFinalDelete  =  document.querySelector('.btnFinalDelete')
                                    btnFinalDelete.setAttribute("href", `./kunjungan/${this.dataset.id}/delete`)
                                })
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>


<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Bukti Transfer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            {{-- <img width="100%" id="image" src="{{ asset('storage/' . $detail->bukti ) }}" alt=""> --}}
            <img width="100%" id="image" src="" alt="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    let foto = document.getElementById('foto');
    foto.addEventListener('click', function(){
        let image = document.getElementById('image');
        image.setAttribute('src', this.dataset.image);
    })
  </script>
@endsection
