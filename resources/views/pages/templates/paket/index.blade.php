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
                            <a href="{{ route('paket.create') }}" class="btn btn-primary"><i class="align-middle me-2" data-feather="file-plus"></i>Data {{ $title }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <table class="table table-bordered table-striped" id="dataTable" >
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center" >No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col" class="text-center" >Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paket as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>Rp {{ number_format($data->harga, 0, ",", ".")  }}</td>
                                        <td class="text-center" >
                                            <div class="btn-group" role="group"  >
                                                <button type="button" class="btn btn-danger btnDelete" data-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal" >Hapus</button>
                                                <a href="{{ route('paket.edit', $data->id) }}" class="btn btn-success">Edit</a>
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
                                    btnFinalDelete.setAttribute("href", `paket/${this.dataset.id}/delete`)
                                })
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection
