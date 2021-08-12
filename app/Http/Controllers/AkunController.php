<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use App\akun;
use App\Transaksi;

class AkunController extends Controller
{


    public function index()
    {
        $id = akun::pluck('no_reff');
        foreach ($id as $i) {
            $saldo[$i] = Transaksi::where('no_reff', $i)->sum('saldo');
            $akun[$i] = akun::findorfail($i); // NGAMBIL DATA AKUN
            $data[$i] = [
                'nama_akuns' => $akun[$i]->nama_akuns,
                'keterangan' => $akun[$i]->keterangan,
                'no_reff'    => $akun[$i]->no_reff,
                'saldo' => $saldo[$i],

            ];
        }
        return view('pages.akun.index', compact('data'));
    }

    public function create()
    {
        return view('pages.akun.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        akun::create($data);
        return redirect('/akun');
    }

    public function edit($no_reff)
    {
        $data = akun::findorfail($no_reff);
        return view('pages.akun.edit')->with([

            'data' => $data
        ]);
    }

    public function update(Request $request, $no_reff)
    {
        $data = $request->all();
        $item = akun::findOrFail($no_reff);
        $item->update($data);
        return redirect('/akun');
    }

    public function destroy($no_reff)
    {
        $data = akun::findOrFail($no_reff);
        $data->delete();
        return redirect('/akun');
    }
}
