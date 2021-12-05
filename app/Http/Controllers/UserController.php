<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->middleware('auth');
    }
    public function absensi()
    {
        return view('u_absensi');
    }
    public function insert()
    {
        Request()->validate([
            //'ketkerja' => 'required',
            //'fotorekap' => 'required',
            'lt2' => 'required',
            'ketkerja' => 'required',
            //'jam' => 'required',
        ], [
            'lt2.required' => 'Periksa Lokasi anda ?!!',
            'fotorekap.required' => 'Wajib Ambil foto ?!!',
            'ketkerja.required' => 'wajib memasukan keterangan'
        ]);
        if (Request()->fotorekap <> "") {
            $data = Request()->fotorekap;
            $extension = explode('/', explode(':', substr($data, 0, strpos($data, ';')))[1])[1];   // .jpg .png .pdf
            $replace = substr($data, 0, strpos($data, ',') + 1);
            $image = str_replace($replace, '', $data);
            $image = str_replace(' ', '+', $image);
            $imageName = Request()->user()->name . "," . date('d-F-Y .') . time() . "." . $extension;
            Storage::disk('public_feeds')->put($imageName, base64_decode($image));
            $rekap = [
                'jam' => Request()->jam,
                'ket_pekerjaan' => Request()->ketkerja,
                'keterangan' => Request()->options,
                'nama' => Request()->user()->name,
                'lat' => Request()->lt2,
                'lng' => Request()->lng2,
                'foto' => $imageName,
            ];
            //dd($image . "" . $replace . " " . $extension . " " . $imageName . "  " . $data);
            $this->UserModel->absensi($rekap);
        } else {
            $rekap = [
                'jam' => Request()->jam,
                'ket_pekerjaan' => Request()->ketkerja,
                'keterangan' => Request()->options,
                'nama' => Request()->user()->name,
                'lat' => Request()->lt2,
                'lng' => Request()->lng2,
            ];
            //dd($image . "" . $replace . " " . $extension . " " . $imageName . "  " . $data);
            $this->UserModel->absensi($rekap);
        }
        return redirect()->route('dashboard')->with('pesan', 'Anda Berhasil Absensi Hari ini !!');
    }

    public function update($id)
    {
        if (Request()->foto <> "") {
            $data = Request()->foto;
            $fileName = Request()->id  . '.' . $data->extension();
            $data->move(public_path('foto1'), $fileName);
            $pw = Request()->password;
            $tambah = [
                'name' => Request()->name,
                'email' => Request()->email,
                'password' => Hash::make($pw),
                'level' => Request()->level,
                'divisi' => Request()->divisi,
                'nohp' => Request()->nohp,
                'foto' => $fileName,
            ];
            //dd("var data= " . $data . " var fileName =" . $fileName);
            $this->UserModel->editData($id, $tambah);
        } else {
            $pw = Request()->password;
            $data = [
                'name' => Request()->name,
                'password' => Hash::make($pw),
                'level' => Request()->level,
                'divisi' => Request()->divisi,
                'nohp' => Request()->nohp,

            ];
            //dd("var data= " . $data . " var fileName =" . $fileName);
            $this->UserModel->editData($id, $data);
        }

        return redirect()->route('profile')->with('pesan', 'Data Berhasil di update');
    }
}
