<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KaryawanModel extends Model
{
    public function allData()
    {
        return DB::table('karyawan')->latest()->get();
    }
    public function detailData($id_karyawan)
    {
        return DB::table('karyawan')->where('id_karyawan', $id_karyawan)->first();
    }
}
