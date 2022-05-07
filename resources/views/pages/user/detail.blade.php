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
                        <h1 class="h2 mb-3" >Detail Data {{ $title }}</h1>
                        <div>
                            <a href="{{ route('admin') }}" class="btn btn-dark">Kembali</a>
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
                                    <td style="width: 300px;" >Nama</td>
                                    <td style="width: 20px;" >:</td>
                                    <td>{{ $data->email }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 300px;" >Role</td>
                                    <td style="width: 20px;" >:</td>
                                    <td>{{ $data->role }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 300px;" >Tanggal</td>
                                    <td style="width: 20px;" >:</td>
                                    <td>{{ $data->created_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection
