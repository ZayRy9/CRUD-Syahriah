<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Syahriah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3>{{ $syahriah->bulan_tagihan }}</h3>
                        <hr/>
                        <p>{{ "Rp " . number_format($syahriah->besar_tagihan, 2, ',', '.') }}</p>
                        <code>
                            <!-- Jika deskripsi ada pada model Syahriah, Anda dapat menambahkannya di sini -->
                        </code>
                        <hr/>
                        <p>Keterangan : {{ $syahriah->keterangan }}</p>
                        <p>Jumlah Bayar : {{ "Rp " . number_format($syahriah->jumlah_bayar, 2, ',', '.') }}</p>
                        <p>Sisa : {{ $syahriah->sisa ? "Rp " . number_format($syahriah->sisa, 2, ',', '.') : '-' }}</p>
                        <p>Kurang : {{ $syahriah->kurang ? "Rp " . number_format($syahriah->kurang, 2, ',', '.') : '-' }}</p>
                        @php
                                            $date = new DateTime($syahriah->waktu_bayar);
                        @endphp
                        <td>{{ $syahriah->waktu_bayar ? date_format($date, 'd M Y H:i:s') : ''}}</td>
                        {{-- <p>Waktu Bayar : {{ $syahriah->waktu_bayar ? $syahriah->waktu_bayar->format('d-m-Y H:i') : '-' }}</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
