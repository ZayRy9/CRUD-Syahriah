
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>App Syahriah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Syahriah</h3>
                    <h5 class="text-center">Manajemen Tagihan Bulanan</h5>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('syahriahs.create') }}" class="btn btn-md btn-success mb-3">ADD Tagihan</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Bulan Tagihan</th>
                                    <th scope="col">Besar Tagihan (Rp)</th>
                                    <th scope="col">Jumlah Bayar (Rp)</th>
                                    <th scope="col">Sisa (Rp)</th>
                                    <th scope="col">Kurang (Rp)</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Waktu Bayar</th>
                                    <th scope="col" style="width: 20%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($syahriahs as $syahriah)
                                    <tr>
                                        <td>{{ $syahriah->bulan_tagihan }}</td>
                                        <td>{{ "Rp " . number_format($syahriah->besar_tagihan, 2, ',', '.') }}</td>
                                        <td>{{ "Rp " . number_format($syahriah->jumlah_bayar, 2, ',', '.') }}</td>
                                        <td>{{ $syahriah->sisa ? "Rp " . number_format($syahriah->sisa, 2, ',', '.') : '-' }}</td>
                                        <td>{{ $syahriah->kurang ? "Rp " . number_format($syahriah->kurang, 2, ',', '.') : '-' }}</td>
                                        <td>{{ $syahriah->keterangan }}</td>
                                        @php
                                            $date = new DateTime($syahriah->waktu_bayar);
                                        @endphp
                                        <td>{{ $syahriah->waktu_bayar ? date_format($date, 'd M Y H:i:s') : ''}}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('syahriahs.destroy', $syahriah->id) }}" method="POST">
                                                <a href="{{ route('syahriahs.show', $syahriah->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('syahriahs.edit', $syahriah->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            <div class="alert alert-danger">
                                                Tidak Ada Data yang Tersedia.
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $syahriahs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // message with sweetalert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>

</body>
</html>
