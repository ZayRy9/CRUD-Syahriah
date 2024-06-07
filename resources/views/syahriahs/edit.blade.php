<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Syahriah - SantriKoding.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('syahriahs.update', $syahriah->id) }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Bulan Tagihan</label>
                                <input type="text" class="form-control @error('bulan_tagihan') is-invalid @enderror" name="bulan_tagihan" value="{{ old('bulan_tagihan', $syahriah->bulan_tagihan) }}" placeholder="Masukkan Bulan Tagihan">
                            
                                <!-- error message untuk bulan_tagihan -->
                                @error('bulan_tagihan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Besar Tagihan (Rp)</label>
                                <input type="number" step="0.01" class="form-control @error('besar_tagihan') is-invalid @enderror" name="besar_tagihan" value="{{ old('besar_tagihan', $syahriah->besar_tagihan) }}" placeholder="Masukkan Besar Tagihan">
                            
                                <!-- error message untuk besar_tagihan -->
                                @error('besar_tagihan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Jumlah Bayar (Rp)</label>
                                <input type="number" class="form-control" name="jumlah_bayar" value="{{ old('jumlah_bayar', $syahriah->jumlah_bayar) }}" readonly>
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Sisa (Rp)</label>
                                <input type="number" step="0.01" class="form-control @error('sisa') is-invalid @enderror" name="sisa" value="{{ old('sisa', $syahriah->sisa) }}" placeholder="Masukkan Sisa">
                            
                                <!-- error message untuk sisa -->
                                @error('sisa')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Kurang (Rp)</label>
                                <input type="number" step="0.01" class="form-control @error('kurang') is-invalid @enderror" name="kurang" value="{{ old('kurang', $syahriah->kurang) }}" placeholder="Masukkan Kurang">
                            
                                <!-- error message untuk kurang -->
                                @error('kurang')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Keterangan</label>
                                <select class="form-control @error('keterangan') is-invalid @enderror" name="keterangan">
                                    <option value="lunas" {{ old('keterangan', $syahriah->keterangan) == 'lunas' ? 'selected' : '' }}>Lunas</option>
                                    <option value="belum lunas" {{ old('keterangan', $syahriah->keterangan) == 'belum lunas' ? 'selected' : '' }}>Belum Lunas</option>
                                </select>
                            
                                <!-- error message untuk keterangan -->
                                @error('keterangan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Waktu Bayar</label>
                                <input type="datetime-local" class="form-control @error('waktu_bayar') is-invalid @enderror" name="waktu_bayar" value="{{ old('waktu_bayar', $syahriah->waktu_bayar ? $syahriah->waktu_bayar->format('Y-m-d\TH:i') : '') }}">
                            
                                <!-- error message untuk waktu_bayar -->
                                @error('waktu_bayar')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
