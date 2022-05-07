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
                        <div class="float-start" >
                            <form class="form-inline float-start" id="form-filter">
                                <div class="mb-3 float-start me-2">
                                    <label for="user_id" class="sr-only">Pasien</label>
                                    <br>
                                    <select class="form-select js-example-basic-single"  name="user_id">
                                        <option>Pilih Pasien</option>
                                        @foreach ($dataPasien as $pasien)
                                            <option  value="{{ $pasien->id }}">{{ $pasien->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-2 float-start me-2">
                                    <label for="fromDate" class="sr-only">Dari Tanggal</label>
                                    <input type="date" class="form-control" id="date" name="fromDate" value="{{ request('fromDate') }}" >
                                </div>
                                <div class="mb-2 float-start me-2">
                                    <label for="toDate" class="sr-only">Sampai Tanggal</label>
                                    <input type="date" class="form-control" id="date2" name="toDate" value="{{ request('toDate') }}" >
                                </div>
                                <button type="submit" style="margin-top: 21px;" class="me-2 float-start btn btn-primary mb-2 px-3">Filter</button>
                            </form>
                            <a href="#" id="print-btn" style="margin-top: 21px;" class="me-2 btn btn-warning mb-2 ml-2 px-3">Print</a>
                            <!-- <a href="#" onclick="event.preventDefault(); document.getElementById('print-form').submit();" style="margin-top: 21px;" class="me-2 btn btn-warning mb-2 ml-2 px-3">Print</a> -->
                            <!-- <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Print</a> -->
                            <form id="print-form"  action="{{ route('laporan.print') }}" name="print-form" method="POST" >
                                @csrf'
                                <input type="hidden" class="form-control" id="print-date" name="fromDate" value="{{ request('fromDate') }}" >
                                <input type="hidden" class="form-control" id="print-date2" name="toDate" value="{{ request('toDate') }}" >
                                <input type="hidden" class="form-control" id="anggota2" name="anggota" value="{{ request('anggota') }}" >
                            </form>
                        </div>
                    </div>
                    @php
                        $urlAnggota = '0';
                        if(request()->get('anggota')){
                             $urlAnggota = request()->get('anggota');
                        }
                    @endphp
                    <script>
                        let filterForm = document.getElementById('form-filter');
                        let printBtn = document.getElementById('print-btn');
                        let printForm = document.getElementById('print-form');
                        let date = document.getElementById('date');
                        let date2 = document.getElementById('date2');
                        let printDate = document.getElementById('print-date');
                        let printDate2 = document.getElementById('print-date2');
                        let anggota2 = document.getElementById('anggota2');

                        printBtn.addEventListener('click', function(){
                            printDate.value = date.value;
                            printDate2.value = date2.value;
                            anggota2.value = $('.js-example-basic-single').val()
                            printForm.submit();
                        })

                        // $('.js-example-basic-single').on("select2:selecting", function(e) {
                        //     console.log($(".js-example-basic-single").val())
                        // });
                        let urlAnggota =  ''
                        $('.js-example-basic-single').on("change", function(e) {
                            let valuee = $('.js-example-basic-single').val()
                            anggota2.value = $('.js-example-basic-single').val()
                            filterForm.submit();
                        });
                        urlAnggota =  <?= $urlAnggota ?>;

                        console.log(urlAnggota)
                        $('.js-example-basic-single').val(urlAnggota)

                    </script>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center" >No</th>
                                    <th scope="col">No. Kunungann</th>
                                    <th scope="col">Paket</th>
                                    <th scope="col">Pasien</th>
                                    <th scope="col">Antrian</th>
                                    <th scope="col">Dokter</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $laporan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $laporan->no_kunjungan }}</td>
                                        <td>{{ $laporan->paket->nama }}</td>
                                        <td>{{ $laporan->user->name }}</td>
                                        @if (!$laporan->antrian)
                                            <td class="fst-italic text-secondary" >Belum ditentukan</td>
                                        @else
                                            <td>{{ $laporan->antrian->no_antrian }}</td>
                                        @endif
                                        @if (!$laporan->dokter)
                                            <td class="fst-italic">Belum ditentukan</td>
                                        @else
                                            <td>{{ $laporan->dokter->nama }}</td>
                                            @endif
                                        <td>Rp {{ number_format($laporan->paket->harga, 0, ",", ".") }}</td>
                                        <td class="text-capitalize" >{{ $laporan->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection
