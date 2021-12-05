<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserModel extends Model
{
    public function absensi($data)
    {
        DB::table('tbl_rekapan')->crossJoin('users')->insert($data);
    }
    public function editData($id, $data)
    {
        DB::table('users')->where('id', $id)->update($data);
    }
}
