<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KaryawanModel;

class KaryawanController extends Controller
{
    //
    public function __construct()
    {
        $this->KaryawanModel = new KaryawanModel();
    }
    public function index()
    {
        $data = [
            'tbl_karyawan' => $this->KaryawanModel->allData(),
        ];
        return view('a_layout/a_karyawan', $data);
    }
    public function detail($id_karyawan)
    {
        if (!$this->KaryawanModel->detailData($id_karyawan)) {
            abort(404);
        }
        $data = [
            'tbl_karyawan' => $this->KaryawanModel->detailData($id_karyawan),
        ];
        return view('a_detailkaryawan', $data);
    }
}
