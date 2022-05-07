@extends('layouts.main')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data {{ $title }}</li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between border-bottom">
                            <h1 class="h2 mb-3">Data {{ $title }}</h1>
                            <div>
                                <a href="{{ route('admin.ruangan.create') }}" class="btn btn-primary"><i
                                        class="align-middle me-2" data-feather="file-plus"></i>Data {{ $title }}</a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (session('message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('message') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
