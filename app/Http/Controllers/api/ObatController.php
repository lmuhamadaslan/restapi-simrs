<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ObatModel;

class ObatController extends Controller
{
    public function index()
    {
        $data = ObatModel::join('jenis', 'databarang.kdjns', '=', 'jenis.kdjns')
            ->join('industrifarmasi', 'industrifarmasi.kode_industri', '=', 'databarang.kode_industri')
            ->join('gudangbarang', 'databarang.kode_brng', '=', 'gudangbarang.kode_brng')
            ->join('resep_dokter', 'resep_dokter.kode_brng', '=', 'databarang.kode_brng')
            ->select('databarang.kode_brng', 'databarang.nama_brng', 'jenis.nama', 'databarang.kode_sat', 'databarang.h_beli', 'databarang.letak_barang', 'industrifarmasi.nama_industri', 'databarang.h_beli', 'gudangbarang.stok', 'resep_dokter.jml', 'resep_dokter.aturan_pakai')
            ->get();
        return response()->json([
            'success' => true,
            'message' => 'Daftar data obat',
            'data' => $data
        ], 200);
    }
    
    public function find($nama_barang){
        $data = ObatModel::join('jenis', 'databarang.kdjns', '=', 'jenis.kdjns')
            ->join('industrifarmasi', 'industrifarmasi.kode_industri', '=', 'databarang.kode_industri')
            ->join('gudangbarang', 'databarang.kode_brng', '=', 'gudangbarang.kode_brng')
            ->join('resep_dokter', 'resep_dokter.kode_brng', '=', 'databarang.kode_brng')
            ->select('databarang.kode_brng', 'databarang.nama_brng', 'jenis.nama', 'databarang.kode_sat', 'databarang.h_beli', 'databarang.letak_barang', 'industrifarmasi.nama_industri', 'databarang.h_beli', 'gudangbarang.stok', 'resep_dokter.jml', 'resep_dokter.aturan_pakai')
            ->where('databarang.nama_brng', 'like', '%' . $nama_barang . '%')
            ->get();
        return response()->json([
            'success' => true,
            'message' => 'Daftar data obat',
            'data' => $data
        ], 200);
    }
}
