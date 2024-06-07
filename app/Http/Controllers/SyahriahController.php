<?php

namespace App\Http\Controllers;

use App\Models\Syahriah;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;

class SyahriahController extends Controller
{
    protected $carbon;
    public function __construct()
    {
        $this->carbon = new Carbon();
    }
    public function index(): View
    {
        $syahriahs = Syahriah::latest()->paginate(10);
        return view('syahriahs.index', compact('syahriahs'));
    }

    public function create(): View
    {
        return view('syahriahs.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'bulan_tagihan' => 'required|string',
            'besar_tagihan' => 'required|numeric',
            'jumlah_bayar' => 'required|numeric',
            'sisa' => 'nullable|numeric',
            'kurang' => 'nullable|numeric',
            'keterangan' => 'required|in:lunas,belum lunas',
            'waktu_bayar' => 'required|date'
        ]);

        // Hitung sisa atau kurang berdasarkan jumlah bayar dan besar tagihan
        $besar_tagihan = $request->besar_tagihan;
        $jumlah_bayar = $request->jumlah_bayar;
        $sisa = ($jumlah_bayar > $besar_tagihan) ? $jumlah_bayar - $besar_tagihan : null;
        $kurang = ($jumlah_bayar < $besar_tagihan) ? $besar_tagihan - $jumlah_bayar : null;

        Syahriah::create([
            'bulan_tagihan' => $request->bulan_tagihan,
            'besar_tagihan' => $besar_tagihan,
            'jumlah_bayar' => $jumlah_bayar,
            'sisa' => $sisa,
            'kurang' => $kurang,
            'keterangan' => $request->keterangan,
            'waktu_bayar' => $request->waktu_bayar
        ]);

        return redirect()->route('syahriahs.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {
        $syahriah = Syahriah::findOrFail($id);
        return view('syahriahs.show', compact('syahriah'));
    }

    public function edit(string $id): View
    {
        $syahriah = Syahriah::findOrFail($id);
        return view('syahriahs.edit', compact('syahriah'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'bulan_tagihan' => 'required|string',
            'besar_tagihan' => 'required|numeric',
            'jumlah_bayar' => 'required|numeric',
            'sisa' => 'nullable|numeric',
            'kurang' => 'nullable|numeric',
            'keterangan' => 'required|in:lunas,belum lunas',
            'waktu_bayar' => 'required|date'
        ]);

        $syahriah = Syahriah::findOrFail($id);

        $besar_tagihan = $request->besar_tagihan;
        $jumlah_bayar = $request->jumlah_bayar;
        $sisa = ($jumlah_bayar > $besar_tagihan) ? $jumlah_bayar - $besar_tagihan : null;
        $kurang = ($jumlah_bayar < $besar_tagihan) ? $besar_tagihan - $jumlah_bayar : null;

        $syahriah->update([
            'bulan_tagihan' => $request->bulan_tagihan,
            'besar_tagihan' => $besar_tagihan,
            'jumlah_bayar' => $jumlah_bayar,
            'sisa' => $sisa,
            'kurang' => $kurang,
            'keterangan' => $request->keterangan,
            'waktu_bayar' => $request->waktu_bayar
        ]);

        return redirect()->route('syahriahs.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $syahriah = Syahriah::findOrFail($id);
        $syahriah->delete();
        return redirect()->route('syahriahs.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
