<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Store;

class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $storeList = DB::table('stores')
        ->join('store_types', 'store_types.id', '=', 'stores.store_type_id')
        ->select('stores.id', 'stores.status', 'stores.address', 'stores.name', 'store_types.type_name')
        ->simplePaginate(10);
        //dd($employeesList);
        return view('storesList')->with('storesList', $storeList);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $stores = DB::table('store_types')->select('id', 'type_name')->get();
        return view('createStore')->with(['store_types'=>$stores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'storeType' => 'required|integer',
            'storeStatus' => 'required'
            ]
        );

        $newStore = new Store();
        $newStore->name = $request->input('name');
        $newStore->address = $request->input('address');
        $newStore->store_type_id = $request->input('storeType');
        $newStore->status = $request->input('storeStatus');
        $newStore->save();

        return redirect()->to('/stores')->with('success','Store was added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $store = Store::findOrFail($id);
        $store = $store->join('store_types', 'store_types.id', '=', 'stores.store_type_id')->where('stores.id', $id)
        ->select('stores.id', 'stores.status', 'stores.address', 'stores.name', 'stores.store_type_id','store_types.type_name')->get();
        $storeType = DB::table('store_types')->select('id', 'type_name')->get();
        return view('storesUpdate')->with(['store'=>$store, 'storeType'=>$storeType]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $store = Store::findOrFail($id);
        $store->name = $request->input('name');
        $store->address = $request->input('address');
        $store->store_type_id = $request->input('storeType');
        $store->status = $request->input('storeStatus');
        $store->update();

        return redirect()->to('/stores')->with('success','Store was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
