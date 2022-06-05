<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Faktur;
use App\Models\User;

class FakturController extends Controller
{
    //
    public function CreateFaktur() {
        // $this->authorize('user');
        return view('CreateFaktur');
    }

    public function StoreFaktur(Request $request){

        // input validasi
        $request->validate([
            'KategoriBarang' => ['required', 'string', 'min:3', 'max:40'],
            // 'generateInvoice' => ['required', 'string'],
            'NamaBarang' => ['required', 'string', 'min:6', 'max:12'],
            'KuantitasBarang' => ['required', 'integer', 'min:6', 'max:12'],
            'AlamatPengiriman' => ['required', 'string', 'min:10', 'max:100'] 
            // Diawali dengan nomor 0 dan 8 
        ]);

        // masukin data ke database
        Faktur::create([
            'KategoriBarang' => $request->KategoriBarang,
            // 'HargaBarang' => $request->HargaBarang,
            'NamaBarang'=> $request->NamaBarang,
            'KuantitasBarang' => $request->KuantitasBarang,
            'AlamatPengiriman' => $request->AlamatPengiriman,
        ]);

        return redirect('/');
    }

    public function ShowFaktur(){
        $Faktur = Faktur::all();
        return view('ShowFaktur', compact('Faktur'));
    }

    public function formUpdateFaktur($id){
        $Faktur = Faktur::findOrFail($id);
        return view('UpdateFaktur', compact('Faktur'));
    }

    public function UpdateFaktur($id, Request $request){
        Faktur::findOrFail($id)->update([
            'KategoriBarang' => $request->KategoriBarang,
            // 'HargaBarang' => $request->HargaBarang,
            'NamaBarang' => $request->NamaBarang,
            'KuantitasBarang' => $request->KuantitasBarang,
            'AlamatPengiriman' => $request->AlamatPengiriman
        ]);

        return redirect('/show/faktur');
    }

    public function DeleteFaktur($id){
        Faktur::destroy($id);
        return redirect('/show/faktur');
    }

    public function GetInventory(){
        $Faktur = Faktur::all();

        return $Faktur;
    }
}
