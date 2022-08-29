<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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

    public function adminlists()
    {
        $all = Booking::all();
        // dd($all[0]->fasility);
        return view('admin.list', compact('all'));
    }

    public function adminlistshistory()
    {
        $all = Booking::all();
        // dd($all[0]->fasility);
        return view('admin.listhistory', compact('all'));
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
            'user_id' => Auth::user()->id
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

    public function searching(Request $request)
    {
        $all = Booking::whereYear('created_at', '=', $request->tahun)
              ->whereMonth('created_at', '=', $request->bulan)
              ->get();

            //   dd($data, $request->all());die;
        return view('admin.listhistory', compact('all'));
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
