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