<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function lists()
    {
        $all = Booking::all();
        // dd($all[0]->fasility);
        return view('customer.list', compact('all'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $image = $request->file('image');
        $gambar = time().'.'.$image->getClientOriginalExtension();
        // dd(public_path('images').$gambar, $request->all());

        Booking::create([
            'tanggal' => $request->tanggal,
            'image' => $request->image->move('images/',$gambar),
            'fasility_id' => $request->id,
        ]);

        return redirect()->back();
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
    }

    public function listsApprove(Request $request, $id)
    {
        // dd($request->all(),$id);
        $data = Booking::find($id);
        $data->status = $request->status;
        $data->save();

        return redirect()->back();
    }

    public function restore(Request $request, $id)
    {
        // dd($request->all(),$id);
        $data = Booking::find($id);
        $data->status = null;
        $data->save();

        return redirect()->back();
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
