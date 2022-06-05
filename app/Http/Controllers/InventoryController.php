<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Inventory;

class InventoryController extends Controller
{
    //
    public function CreateInventory() {
        // $this->authorize('admin'); -> Hapus ajaa
        return view('CreateInventory');
    }

    public function StoreInventory(Request $request){
        $extension = $request->file('FotoBarang')->getClientOriginalExtension();
        $fileName = $request->Kategori.'_'.$request->NamaBarang.'.'.$extension;
        $request->file('FotoBarang')->storeAs('public/image', $fileName);

        // input validasi
        $request->validate([
            // 'bookTitle' => 'min:5|max:100',
            'FotoBarang' => 'required|image|mimes:jpg,png,jpeg,gif,svg'
        ]);

        Inventory::create([
            'Kategori' => $request->Kategori,
            'NamaBarang' => $request->NamaBarang,
            'HargaBarang' => $request->HargaBarang,
            'JumlahBarang' => $request->JumlahBarang,
            'FotoBarang' => $fileName
        ]);

        return redirect('/');
    }

    public function ShowInventory(){
        $Inventory = Inventory::all();
        return view('ShowInventory', compact('Inventory'));
    }

    // kita gaperlu bikin route ini kan ya ? 
    public function ShowInventoryById($id){
        $Inventory = Inventory::findOrFail($id);
        // $comments = Comment::has('BookId', '==', $id)->get();

        return view('ShowInventoryById', compact('Inventory'));
    }

    public function formUpdateInventory($id){
        $Inventory = Inventory::findOrFail($id);   
        return view('UpdateInventory', compact('Inventory'));
    }

    public function UpdateInventory($id, Request $request){
        Inventory::findOrFail($id)->update([
            'Kategori' => $request->Kategori,
            'NamaBarang' => $request->NamaBarang,
            'HargaBarang' => $request->HargaBarang,
            'FotoBarang' => $request->FotoBarang
        ]);

        return redirect('/show/inventory');
    }

    public function DeleteInventory($id){
        Inventory::destroy($id);
        return redirect('/show/inventory');
    }

    public function GetInventory(){
        $Inventory = Inventory::all();

        return $Inventory;
    }
}
