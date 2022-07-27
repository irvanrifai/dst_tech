<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorependudukRequest;
use App\Http\Requests\UpdatependudukRequest;

class PendudukController extends Controller
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
            // 'data' => penduduk::latest()->get(),
            // 'jumlahData' => penduduk::all()->count(),
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
     * @param  \App\Http\Requests\StorependudukRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorependudukRequest $request)
    {
        $rules = [
            'foto' => 'required|file|image|max:4096',
            'NIK' => 'required|size:16|digits:16|unique:penduduk',
            'nama' => 'required|max:50|string',
            'tm_lahir' => 'required|max:50',
            'tgl_lahir' => 'required|date',
            'jk' => 'required',
            'agama' => 'required',
            'status' => 'required',
            'goldar' => 'required',
            'pekerjaan' => 'required|max:50',
            'wn' => 'required',
            'provinsi' => 'required|max:50',
            'kab' => 'required|max:50',
            'kec' => 'required|max:50',
            'kel' => 'required|max:50',
            'rt' => 'required',
            'rw' => 'required',
            'add' => 'required|max:50',
        ];

        // $validatedData['password'] = bcrypt($validatedData['password']);
        // $validatedData['user_id'] = auth()->user()->id;

        if ($request->validate($rules)) {
            // produk::create($rules);
            return redirect('/AuthController')->with('success_c', 'Add data KTP successfull!');
        } else {
            // dd('data gagal ditambah');
            $request->session()->flash('failed_c', 'Add data KTP unsuccessfull!');
            return redirect('/AuthController')
                ->withInput()
                ->withErrors($request->validated($rules));
        }
        // $request->session()->flash('success_c', 'Add data KTP successfull!');
        // return redirect('/AuthController');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    // public function edit(penduduk $penduduk)
    // {
    //     return view('admin', [
    //         'data' => $penduduk,
    //     ]);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatependudukRequest  $request
     * @param  \App\Models\penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    // public function update(UpdatependudukRequest $request, penduduk $penduduk, $id)
    // {
    //     $rules = [
    //         'foto' => 'required|file|image|max:4096',
    //         'nama' => 'required|max:50|string',
    //         'tm_lahir' => 'required|max:50',
    //         'tgl_lahir' => 'required|date',
    //         'jk' => 'required',
    //         'agama' => 'required',
    //         'status' => 'required',
    //         'goldar' => 'required',
    //         'pekerjaan' => 'required|max:50',
    //         'wn' => 'required',
    //         'provinsi' => 'required|max:50',
    //         'kab' => 'required|max:50',
    //         'kec' => 'required|max:50',
    //         'kel' => 'required|max:50',
    //         'rt' => 'required',
    //         'rw' => 'required',
    //         'add' => 'required|max:50',
    //     ];
    //     // kondisi untuk cek NIK belum jalan
    //     if ($request->NIK != $penduduk->NIK) {
    //         $rules['NIK'] = 'required|size:16|digits:16|unique:penduduk';
    //     }

    //     // dd($request->NIK, $penduduk->get('NIK'));

    //     $validatedData = $request->validate($rules);

    //     penduduk::where('id', $id)->update($validatedData);

    //     $request->session()->flash('success_u', 'Update data KTP successfull!');

    //     return redirect('/AuthController');

    //     // if (!$validatedData = $request->validate($rules)) {
    //     //     dd('data gagal ditambah');
    //     //     $request->session()->flash('failed_u', 'Update data KTP unsuccessfull!');

    //     //     return redirect('/AuthController')->withInput();
    //     // };

    //     // // $validatedData['password'] = bcrypt($validatedData['password']);
    //     // // $validatedData['user_id'] = auth()->user()->id;

    //     // penduduk::where('id', $id)
    //     //     ->update($validatedData);

    //     // $request->session()->flash('success_u', 'Update data KTP successfull!');

    //     // // return redirect('/admin')->with('success_c', 'Add data KTP successfull!');
    //     // return redirect('/AuthController');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    // public function destroy(penduduk $penduduk, $id)
    // {
    //     penduduk::destroy($penduduk->id, $id);

    //     return redirect('/AuthController')->with('success_d', 'Delete data KTP successfull!');
    // }
}
