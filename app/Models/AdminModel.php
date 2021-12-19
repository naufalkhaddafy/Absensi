<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminModel extends Model
{
    public function allData()
    {
        return DB::table('users')->get();
    }
    public function detailData($id)
    {
        return DB::table('users')->where('id', $id)->first();
    }
    public function detaillokasi($id)
    {
        return DB::table('tbl_rekapan')->where('id', $id)->first();
    }
    public function rekapData()
    {
        return DB::table('tbl_rekapan')->latest()->get();
    }
    public function editData($id, $data)
    {
        DB::table('users')->where('id', $id)->update($data);
    }
    public function hapus_data($id)
    {
        return DB::table('users')->where('id', $id)->delete();
    }
    public function tambah($data)
    {
        DB::table('users')->insert($data);
    }
    public function hapus_datarekapan()
    {
        return DB::table('tbl_rekapan')->delete();
    }

    protected $table = "tbl_rekapan";
    protected $fillable = ['created_at', 'nama', 'keterangan', 'ket_pekerjaan', 'lokasi'];
}
