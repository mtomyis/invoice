<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\M_detail_invoice;

class C_detail_invoice extends Controller
{
    public function index($id)
    {
        return view('detail_invoice');
    }

    public function input(Request $request){

        $post = new M_detail_invoice();

        $post->kode = $request->data_kode;
        $post->barang = $request->data_barang;
        $post->satuan = $request->data_satuan;
        $post->jumlah = $request->data_jumlah;
        $post->harga = $request->data_harga;
        $post->potongan = $request->data_potongan;
        $post->total = $request->data_total;
        $post->keterangan = $request->data_ket;
        $post->id_invoice = $request->id_invoice;
        $post->save();

        // dd($request);

        $data="Data Inserted";
        return $data;
    }

    public function fetch(Request $request){

        $post = new M_detail_invoice();

        // dd($request);
        $no=1;
        $data_detail = $post::where('id_invoice', $request->id_invoice);
        if ($data_detail->count()!=0) {
            foreach ($data_detail->get() as $detail) {
                $sub_array = array();
                $sub_array[] = '<div>' . $no++ . '</div>';
                $sub_array[] = '<div contenteditable class="update" data-id="'.$detail->id.'" data-column="kode">' . $detail->kode . '</div>';
                $sub_array[] = '<div contenteditable class="update" data-id="'.$detail->id.'" data-column="barang">' . $detail->barang . '</div>';
                $sub_array[] = '<div contenteditable class="update" data-id="'.$detail->id.'" data-column="satuan">' . $detail->satuan . '</div>';
                $sub_array[] = '<div contenteditable class="update" data-id="'.$detail->id.'" data-column="jumlah">' . $detail->jumlah . '</div>';
                $sub_array[] = '<div contenteditable class="update" data-id="'.$detail->id.'" data-column="harga">' . $detail->harga . '</div>';
                $sub_array[] = '<div contenteditable class="update" data-id="'.$detail->id.'" data-column="potongan">' . $detail->potongan . '</div>';
                $sub_array[] = '<div contenteditable class="update" data-id="'.$detail->id.'" data-column="total">' . $detail->total . '</div>';
                $sub_array[] = '<div contenteditable class="update" data-id="'.$detail->id.'" data-column="keterangan">' . $detail->keterangan . '</div>';
    
                $sub_array[] = '<button type="button" name="delete" class="btn btn-danger waves-effect delete" id="'.$detail->id.'">Delete</button>';
                $data[] = $sub_array;
            }
        }else{
            $data = array();
        }

        $output = array(
            // "draw"    => 0,
            // "recordsTotal"  =>  2,
            // "recordsFiltered" => 2,
            "data" => $data
        );

        // dd($data);
        return $output;
    }

    public function update(Request $request)
    {
        $post = new M_detail_invoice();
        $post::where('id',$request->id)->update([$request->column_name => $request->value]);
        $data = 'Data Updated';
        return $data;
    }

    public function delete(Request $request)
    {
        $post = new M_detail_invoice();
        $post::where('id',$request->id)->delete();
        $data = 'Data Deleted';
        return $data;
    }
}