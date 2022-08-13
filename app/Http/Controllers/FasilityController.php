<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fasility;

class FasilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Fasility::all();

        return view('fasilities.index', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fasilities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $gambar = time().'.'.$image->getClientOriginalExtension();
        // dd(public_path('images').$gambar, $request->all());

        Fasility::create([
            'name' => $request->name,
            'image' => $request->image->move('images/',$gambar),
            'category_id' => $request->categori_id,
            'desc' => $request->desc,
            'price' => $request->price,
            'satuan' => $request->satuan,
        ]);

        return redirect()->route('fasilities.index');
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
        $get = Fasility::find($id);

        return view('fasilities.edit', compact('get'));
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
        $update = Fasility::find($id);
        $update->name = $request->name;
        if ($request->image == null) {
        } else {
            unlink($update->image);
            $image = $request->file('image');
            $gambar = time().'.'.$image->getClientOriginalExtension();
            $update->image = $request->image->move('images/',$gambar);
        }
        $update->category_id = $request->categori_id;
        $update->desc = $request->desc;
        $update->price = $request->price;
        $update->satuan = $request->satuan;
        $update->save();

        return redirect()->route('fasilities.index');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $get = Fasility::find($id);
        unlink($get->image);
        $get->delete();

        return redirect()->back();
    }
}
