<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\akun;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $datas = Transaksi::all();
        $totalDebit = Transaksi::where('jenis_saldo', 'Debit')->sum('saldo');
        $totalKredit = Transaksi::where('jenis_saldo', 'kredit')->sum('saldo');
        $akun = akun::count();
        $transaksi = Transaksi::count();
        return view('dashboard', compact('datas', 'totalDebit', 'totalKredit', 'akun', 'transaksi'));
    }
}
