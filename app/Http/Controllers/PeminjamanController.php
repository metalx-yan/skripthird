<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peminjaman;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Peminjaman::all();

        return view('peminjamans.index', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('peminjamans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Peminjaman::create([
            'no' => $request->no,
            'tanggal' => $request->tanggal,
            'fasility_id' => $request->fasility_id,
            'lama' => $request->lama,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('peminjamans.index');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $get = Peminjaman::find($id);
        return view('peminjamans.edit', compact('get'));
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
        // dd($request->all());
        $update = Peminjaman::find($id);
        $update->no = $request->no;
        $update->tanggal = $request->tanggal;
        $update->fasility_id = $request->fasility_id;
        $update->lama = $request->lama;
        $update->status = $request->status;
        $update->keterangan = $request->keterangan;
        $update->save();

        return redirect()->route('peminjamans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $get = Peminjaman::find($id);
        $get->delete();

        return redirect()->back();
    }
}
