<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreprodukRequest;
use App\Http\Requests\UpdateprodukRequest;

class produkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcomee', [
            'title' => 'welcome',
            // 'data' => produk::latest()->get(),
            // 'jumlahData' => produk::all()->count(),
            'userLoggedIn' => User::all()->count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('welcomee');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreprodukRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreprodukRequest $request)
    {
        $rules = [
            'uuid' => 'required',
            'name' => 'required',
            'type' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ];

        // $validatedData['password'] = bcrypt($validatedData['password']);
        // $validatedData['user_id'] = auth()->user()->id;

        if ($request->validate($rules)) {
            // produk::create($rules);
            return redirect('/PendudukController')->with('success_c', 'Add successfull!');
        } else {
            // dd('data gagal ditambah');
            $request->session()->flash('failed_c', 'Add unsuccessfull!');
            return redirect('/PendudukController')
                ->withInput()
                ->withErrors($request->validated($rules));
        }
        // $request->session()->flash('success_c', 'Add successfull!');
        // return redirect('/PendudukController');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(produk $produk)
    {
        return view('welcomee', [
            'data' => $produk,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateprodukRequest  $request
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateprodukRequest $request, produk $produk, $id)
    {
        $rules = [
            'uuid' => 'required',
            'name' => 'required',
            'type' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ];

        $validatedData = $request->validate($rules);

        produk::where('id', $id)->update($validatedData);

        $request->session()->flash('success_u', 'Update successfull!');

        return redirect('/PendudukController');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(produk $produk, $id)
    {
        produk::destroy($produk->id, $id);

        return redirect('/PendudukController')->with('success_d', 'Delete successfull!');
    }
}
