<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = DB::select('select b.kode_brg, b.nama, b.satuan, b.hbeli, b.stock from mbarang b where b.Active_status = ?', [1]);
    
        return view('invoices.index',compact('invoices'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function getData($id)
    {
        $data = DB::table('mbarang')->where('kode_brg', $id)
            ->first();
            
        return response()->json($data);
    }
}
