<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\M_invoice;

class C_invoice extends Controller
{
    public function input(Request $request){

        $post = new M_invoice();

        $post->nama = $request->nama;
        $post->id_kantor = $request->kantor;
        $post->alamat = $request->alamat;
        $post->no_transaksi = $request->no_transaksi;
        $post->tgl_transaksi = $request->tanggal_transaksi;
        $post->save();

        $data_invoice = $post::latest()->first();
        // dd($data_invoice->id);
        return redirect('/detail-invoice/'.$data_invoice->id);
    }
}