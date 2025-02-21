<div>

    <!-- BEGIN: Content -->
    <div class="content">
        <h2 class="intro-y text-lg font-medium mt-10">
            Laporan Transaksi
        </h2>
        <div>
            <a href="{{ url('/cetak') }}" target="_blank"><button class="btn btn-primary shadow-md mr-1 mt-4 mb-2"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="file-text" data-lucide="file-text" class="lucide lucide-file-text w-4 h-4 mr-2">
                        <path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <line x1="10" y1="9" x2="8" y2="9"></line>
                    </svg> Cetak Laporan </button></a>

            <div class="card border-primary mt-3">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>No Inv.</th>
                            <th>Total</th>
                        </thead>
                        <tbody>
                            @foreach ($semuaTransaksi as $Trans )
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$Trans->created_at}}</td>
                                <td>{{$Trans->kode}}</td>
                                <td> Rp. {{number_format($Trans->total,2,'.',',')}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content -->

</div>