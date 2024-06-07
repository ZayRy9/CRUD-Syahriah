<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Syahriah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3 class="text-center my-4">Add New Syahriah</h3>
                        <form action="{{ route('syahriahs.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="bulan_tagihan" class="form-label">Bulan Tagihan</label>
                                <input type="text" class="form-control @error('bulan_tagihan') is-invalid @enderror" name="bulan_tagihan" value="{{ old('bulan_tagihan') }}">
                                @error('bulan_tagihan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="besar_tagihan" class="form-label">Besar Tagihan (Rp)</label>
                                <input type="number" step="0.01" class="form-control @error('besar_tagihan') is-invalid @enderror" name="besar_tagihan" value="{{ old('besar_tagihan') }}">
                                @error('besar_tagihan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="jumlah_bayar" class="form-label">Jumlah Bayar (Rp)</label>
                                <input type="number" step="0.01" class="form-control @error('jumlah_bayar') is-invalid @enderror" name="jumlah_bayar" value="{{ old('jumlah_bayar') }}">
                                @error('jumlah_bayar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="sisa" class="form-label">Sisa (Rp)</label>
                                <input type="number" step="0.01" class="form-control @error('sisa') is-invalid @enderror" name="sisa" value="{{ old('sisa') }}">
                                @error('sisa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="kurang" class="form-label">Kurang (Rp)</label>
                                <input type="number" step="0.01" class="form-control @error('kurang') is-invalid @enderror" name="kurang" value="{{ old('kurang') }}">
                                @error('kurang')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <select class="form-control @error('keterangan') is-invalid @enderror" name="keterangan">
                                    <option value="lunas" {{ old('keterangan') == 'lunas' ? 'selected' : '' }}>Lunas</option>
                                    <option value="belum lunas" {{ old('keterangan') == 'belum lunas' ? 'selected' : '' }}>Belum Lunas</option>
                                </select>
                                @error('keterangan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="waktu_bayar" class="form-label">Waktu Bayar</label>
                                <input type="datetime-local" class="form-control @error('waktu_bayar') is-invalid @enderror" name="waktu_bayar" value="{{ old('waktu_bayar') }}">
                                @error('waktu_bayar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
