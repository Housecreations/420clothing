<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Store;
use Laracasts\Flash\Flash;

class StoresController extends Controller
{
    public function showStores(){
        $stores = Store::all();
       
        return view('admin.stores.show', ['stores' => $stores]);
        
    }
    
    public function index(){
        
        $stores = Store::orderBy('id', 'DESC')->paginate(5);
        
        return view('admin.stores.index', ['stores' => $stores]);
    }
    public function create(){
         return view('admin.stores.create');
    }
    public function update(Request $request, $id){
        
        $store = Store::find($id);
        $store->fill($request->all());
        $store->save();
        
        Flash::success('La tienda se editó con éxito');
        
        return redirect()->route('admin.stores.index');
        
    }
    public function store(Request $request){
         $store = new Store($request->all());
         $store->save();
        Flash::success('La tienda se creó con éxito');
        
      
         return redirect()->route('admin.stores.index');
    }
    public function edit($id){
        $store = Store::find($id);
        return view('admin.stores.edit', ['store' => $store]);
    }
    public function destroy($id){
        Store::destroy($id);
        
        Flash::success('La tienda ha sido eliminada');
        
        return redirect()->route('admin.stores.index');
    }
    public function show(){
        
    }
}
