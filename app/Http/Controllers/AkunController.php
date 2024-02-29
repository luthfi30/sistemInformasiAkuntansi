<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use App\akun;

class AkunController extends Controller
{


    public function index()
    {
        $datas = akun::all();
        return view('pages.akun.index')->with([
            'datas' => $datas
        ]);
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
