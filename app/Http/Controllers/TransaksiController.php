<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Transaksi;
use Illuminate\Support\Facades\Input;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Transaksi::selectRaw('id,customer,count(*)')->groupBy('customer')->get();
        // dd($all);
        return view('transaksis.index', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaksis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        foreach ($request->addmore as $vals) {
            // dd($vals['product']);
            Transaksi::create([
                'customer' => $request->customer,
                'product' => $vals['product'],
                'kuantitas' => $vals['kuantitas'],
                'harga' => $vals['harga'],
                'order' => $vals['order'],
                'total_order' => $vals['harga']*$vals['order'],
            ]);
        }

        return redirect()->route('transaksis.index');
    }

    public function searching()
    {
        // dd($_POST['id']);
        $get = Product::find($_POST['id']);

        return json_encode($get);
    
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

    public function summary()
    {
        $all = Transaksi::selectRaw('transaksis.id,transaksis.customer,products.name,products.kuantitas,transaksis.order,products.kuantitas-transaksis.order sisa_stock,products.harga,transaksis.total_order')
        ->join('products', 'products.id', '=', 'transaksis.product')
        ->get();
        // dd($all);
        return view('transaksis.summary',compact('all'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $get = Transaksi::where('customer',$id)->get();
        // dd($get);
        return view('transaksis.edit', compact('get'));
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
        // $update = Transaksi::find($id);
        // $update->name = $request->name;
        // $update->kuantitas = $request->kuantitas;
        // $update->harga = $request->harga;
        // $update->total_harga = $request->total_harga;
        // $update->save();
        
        // dd($request->all());
        // dd($vals);
        
        Transaksi::where('customer',$request->customer)->delete();
        foreach ($request->addmore as $vals) {
            if ($vals['product'] != null) {
                # code...
                Transaksi::create([
                    'customer' => $request->customer,
                    'product' => $vals['product'],
                    'kuantitas' => $vals['kuantitas'],
                    'harga' => $vals['harga'],
                    'order' => $vals['order'],
                    'total_order' => $vals['harga']*$vals['order'],
                ]);
            } else {

            }
        }

        return redirect()->route('transaksis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $get = Transaksi::find($id);
        $get->delete();

        return redirect()->back();
    }
}
