<?php

namespace App\Http\Controllers;

use App\Models\Muzakki;
use App\Models\ZakatFitrah;  // ✔ pastikan impor model
use Illuminate\Http\Request;

class MuzakkiController extends Controller
{
    // Method dashboard untuk menampilkan view 'dashboard'
    public function dashboard()
{
    $totalMuzakki = Muzakki::count();
    $totalJiwa = Muzakki::sum('jumlah_jiwa');
    $totalZakat = Muzakki::sum('jumlah_zakat'); // PASTIKAN kolom ini ada

    return view('dashboard', compact('totalMuzakki', 'totalJiwa', 'totalZakat'));
}
public function edit($id)
{
    $muzakki = Muzakki::findOrFail($id);
    return view('muzakki.edit', compact('muzakki'));
}

public function update(Request $request, $id)
{
    $muzakki = Muzakki::findOrFail($id);

    $request->validate([
        'nama' => 'required|string|max:255',
        'telepon' => 'required|string|max:20',
        'jumlah_jiwa' => 'required|integer|min:1',
        'payment_method' => 'required',
        'cabang' => 'required|string',
        'status' => 'required',
        'tanggal' => 'required|date',
    ]);

    $jumlah_zakat = $request->jumlah_jiwa * 35000;

    $muzakki->update([
        'nama' => $request->nama,
        'telepon' => $request->telepon,
        'jumlah_jiwa' => $request->jumlah_jiwa,
        'jumlah_zakat' => $jumlah_zakat,
        'payment_method' => $request->payment_method,
        'cabang' => $request->cabang,
        'status' => $request->status,
        'tanggal_pembayaran' => $request->tanggal,
    ]);

    return redirect()->route('muzakki.index')->with('success', 'Data berhasil diperbarui.');
}

    public function index()
    {
        $muzakkis = Muzakki::latest()->get();
        return view('muzakki.index', compact('muzakkis'));
    }

    public function create()
    {
        return view('muzakki.create');
    }

    public function store(Request $request)
    {
        Muzakki::create($request->all());
        return redirect()->route('muzakki.index')->with('success', 'Data berhasil disimpan!');
    }

    public function destroy($id)
    {
        Muzakki::findOrFail($id)->delete();
        return redirect()->route('muzakki.index')->with('success', 'Data berhasil dihapus!');
    }
    public function logout(Request $req)
{
  Auth::logout();
  $req->session()->invalidate();
  $req->session()->regenerateToken();
  return redirect()->route('login');
}


}
