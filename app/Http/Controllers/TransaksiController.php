<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Transaksi;
use App\akun;


class TransaksiController extends Controller
{
    public function index()
    {
        $datas = Transaksi::all();
        $totalDebit = Transaksi::where('jenis_saldo', 'Debit')->sum('saldo');
        $totalKredit = Transaksi::where('jenis_saldo', 'kredit')->sum('saldo');

        return view('pages.transaksi.index', compact('datas', 'totalDebit', 'totalKredit'));
    }


    public function create()
    {
        $akun = akun::all();
        return view('pages.transaksi.create')->with([
            'akun' => $akun
        ]);
    }


    public function store(Request $request)
    {
        $data = $request->all();
        Transaksi::create($data);
        return redirect('/transaksi');
    }

    public function edit($id)
    {
        $data = Transaksi::findorfail($id);
        $akun = akun::all();
        return view('pages.transaksi.edit')->with([

            'data' => $data,
            'akun' => $akun
        ]);
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($data);
        return redirect('/transaksi');
    }

    public function destroy($id)
    {
        $data = Transaksi::findorfail($id);
        $data->delete();
        return redirect('/transaksi');
    }


    public function showbuku()
    {
        $buku = akun::all();
        return view('pages.buku.index')->with(
            [
                'buku' => $buku
            ]
        );
    }

    public function akunbuku($id)
    {
        $buku = Transaksi::selectRaw("CONCAT(MONTH(tanggal_transaksi), '-', YEAR(tanggal_transaksi)) as waktu")->where('no_reff', $id)->distinct()->get();
        $totalbuku = $buku->count();
        $akun = akun::findOrFail($id);

        return view('pages.buku.akun',  compact('buku', 'totalbuku', 'akun'));
    }

    public function detail($id, $waktu)
    {
        if (empty($waktu) || empty($id)) return redirect('pages.buku.index');

        $bulan = date('m', strtotime($waktu));
        $tahun = date('Y', strtotime($waktu));
        $periode = date('F Y', strtotime($waktu));

        $daftar_buku = Transaksi::whereMonth('tanggal_transaksi', $bulan)->whereYear('tanggal_transaksi', $tahun)->orderBy('tanggal_transaksi', 'asc')->where('no_reff', $id)->get();

        $total_debet = Transaksi::where('jenis_saldo', 'Debit')->whereMonth('tanggal_transaksi', $bulan)->whereYear('tanggal_transaksi', $tahun)->orderBy('tanggal_transaksi', 'asc')->where('no_reff', $id)->sum('saldo');

        $total_kredit = Transaksi::where('jenis_saldo', 'Kredit')->whereMonth('tanggal_transaksi', $bulan)->whereYear('tanggal_transaksi', $tahun)->orderBy('tanggal_transaksi', 'asc')->where('no_reff', $id)->sum('saldo');

        $total_buku = $daftar_buku->count();

        $akun = akun::findOrFail($id);

        return view('pages.buku.detail', compact('daftar_buku', 'total_buku', 'periode', 'total_debet', 'total_kredit', 'akun'));
    }

    public function showneraca()
    {
        $daftar_neraca = Transaksi::selectRaw("CONCAT(MONTH(tanggal_transaksi), '-', YEAR(tanggal_transaksi)) as waktu")->distinct()->get();

        $total_neraca = $daftar_neraca->count();

        return view('pages.neraca.index',  compact('daftar_neraca', 'total_neraca'));
    }

    public function detailNeracaSaldo(Request $request, $waktu)
    {
        if (empty($waktu)) return redirect('pages.neraca.index');



        $bulan = date('m', strtotime($waktu));
        $tahun = date('Y', strtotime($waktu));
        $periode = date('F Y', strtotime($waktu));

        $id = akun::pluck('no_reff');

        $total_saldo_debet = 0;
        $total_saldo_kredit = 0;


        foreach ($id as $i) {

            $daftar_buku[$i] = Transaksi::whereMonth('tanggal_transaksi', $bulan)->whereYear('tanggal_transaksi', $tahun)->orderBy('tanggal_transaksi', 'asc')->where('no_reff', $i)->get();

            $total_debet[$i] = Transaksi::where('jenis_saldo', 'Debit')->whereMonth('tanggal_transaksi', $bulan)->whereYear('tanggal_transaksi', $tahun)->orderBy('tanggal_transaksi', 'asc')->where('no_reff', $i)->sum('saldo');

            $total_kredit[$i] = Transaksi::where('jenis_saldo', 'Kredit')->whereMonth('tanggal_transaksi', $bulan)->whereYear('tanggal_transaksi', $tahun)->orderBy('tanggal_transaksi', 'asc')->where('no_reff', $i)->sum('saldo');


            $akun[$i] = akun::findorfail($i); // NGAMBIL DATA AKUN


            if (substr($akun[$i]->no_reff, 0, 1) === '1' ||  substr($akun[$i]->no_reff, 0, 1) === '4') {
                $Debit[$i] = $total_debet[$i] - $total_kredit[$i];
                $Kredit[$i] = 0;
            } elseif (substr($akun[$i]->no_reff, 0, 1) === '2' ||  substr($akun[$i]->no_reff, 0, 1) === '3' || substr($akun[$i]->no_reff, 0, 1) === '5') {
                $Kredit[$i] = $total_kredit[$i] - $total_debet[$i];
                $Debit[$i] = 0;
            }

            $data[$i] = [
                'nama_akuns' => $akun[$i]->nama_akuns,
                'Debit' => $Debit[$i],
                'Kredit' => $Kredit[$i],
            ];

            $total_saldo_debet += $data[$i]['Debit'];
            $total_saldo_kredit += $data[$i]['Kredit'];
        }

        return view('pages.neraca.detail', compact('data', 'total_saldo_debet', 'total_saldo_kredit', 'periode'));
    }
}
