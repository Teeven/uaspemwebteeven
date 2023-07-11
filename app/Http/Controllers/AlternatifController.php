<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index() {
        return view('dataalternatif', [
            'users' => Alternatif::all(),
            'title' => 'Data alternatif'
        ]);
    }
    public function add() {
        return view('adddataalternatif',[
            'title' => 'Tambah Data alternatif'
        ]);
    }
    public function edit($id){
        
        // $alternatif = Alternatif::where('id', $id)->first();

        // return view('editalternatif', [
        //     'alternatif' => $alternatif,
        //     'title' => 'Edit Data alternatif'
        // ]);
        return view('editalternatif')->with([
            'alternatif' => Alternatif::find($id),
        ]);

    }

    public function update(Request $request, $id) {
        $alternatif1      = $request->input('alternatif');
        $Lokasi1   = $request->input('Lokasi');
        $Reputasi1 = $request->input('Reputasi');
        $Keandalan1 = $request->input('Keandalan');
        $Kecepatan_Pelayanan1 = $request->input('Kecepatan_Pelayanan');
        $Biaya1= $request->input('Biaya');
        
        $alternatif = Alternatif::where('id', $id)->first();
        $alternatif->alternatif    = $alternatif1;
        $alternatif->Lokasi = $Lokasi1;
        $alternatif->Reputasi = $Reputasi1;
        $alternatif->Keandalan = $Keandalan1;
        $alternatif->Kecepatan_Pelayanan = $Kecepatan_Pelayanan1;
        $alternatif->Biaya = $Biaya1;

        $alternatif->save();

        return redirect()->to('/alternatif');
    }


    public function dashboard(){
        $alternatif= Alternatif::count();

        return view('main', compact('alternatif'));

    }

    public function store(Request $request) {
        $alternatif1 = $request->input('alternatif');
        $Lokasi1 = $request->input('Lokasi');
        $Reputasi1 = $request->input('Reputasi');
        $Keandalan1 = $request->input('Keandalan');
        $Kecepatan_Pelayanan1 = $request->input('Kecepatan_Pelayanan');
        $Biaya1 = $request->input('Biaya');

        $alternatif = new Alternatif;
        $alternatif->alternatif    = $alternatif1;
        $alternatif->Lokasi = $Lokasi1;
        $alternatif->Reputasi = $Reputasi1;
        $alternatif->Keandalan = $Keandalan1;
        $alternatif->Kecepatan_Pelayanan = $Kecepatan_Pelayanan1;
        $alternatif->Biaya = $Biaya1;

        $alternatif->save();

        return redirect()->to('/alternatif');
    }
    public function delete($id) {
        $alternatif = Alternatif::where('id', $id)->first();
        $alternatif->delete();
        return redirect()->back();
    }
}
