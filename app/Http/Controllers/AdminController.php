<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Exports\ExcelExport;
use Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->AdminModel = new AdminModel();
        $this->middleware('auth');
    }
    public function index()
    {
        return view('a_dashboard');
    }
    public function profile()
    {
        return view('a_profil');
    }
    public function rekapan()
    {
        $data = [
            'rekap' => $this->AdminModel->rekapData(),
        ];
        return view('a_rekapan', $data);
    }

    public function karyawan()
    {
        $data = [
            'users' => $this->AdminModel->allData(),
        ];
        return view('a_karyawan', $data);
    }
    public function edit($id)
    {
        if (!$this->AdminModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'users' => $this->AdminModel->detailData($id),
        ];
        return view('edit', $data);
    }
    public function update($id)
    {
        if (Request()->foto <> "") {
            $data = Request()->foto;
            $fileName = Request()->name  . '.' . $data->extension();
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
            $this->AdminModel->editData($id, $tambah);
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
            $this->AdminModel->editData($id, $data);
        }

        return redirect()->route('karyawan')->with('pesan', 'Data Berhasil di update');
    }


    public function detail($id)
    {
        if (!$this->AdminModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'users' => $this->AdminModel->detailData($id),
        ];
        return view('a_detailkaryawan', $data);
    }
    public function detaillokasi($id)
    {
        if (!$this->AdminModel->detaillokasi($id)) {
            abort(404);
        }
        $data = [
            'users' => $this->AdminModel->detaillokasi($id),
        ];
        return view('detaillokasi', $data);
    }
    public function delete($id)
    {
        $staff = $this->AdminModel->detailData($id);
        if ($staff->foto <> "") {
            unlink(public_path('foto1') . '/' . $staff->foto);
        }
        $this->AdminModel->hapus_data($id);
        return redirect()->route('karyawan')->with('pesan', 'Data Berhasil di hapus');
    }
    public function deleterekapan()
    {
        $this->AdminModel->hapus_datarekapan();
        return redirect()->route('rekapan')->with('pesan', 'Data Berhasil di hapus');
    }
    public function exportexcel($tglawal, $tglakhir)
    {

        $nama_file = 'Rekapan_Harian_' . date('D-d-F-Y') . '.csv';
        // return FacadesExcel::download(new ExcelExport, $cetaktanggal);
        //dd("tanggal awal : " . $tglawal, "tanggal akhir :" . $tglakhir);
        //return (new ExcelExport($tglawal, $tglakhir))->download('invoices.csv');
        return (new ExcelExport($tglawal, $tglakhir))->download($nama_file);
    }
    public function tambah()
    {
        return view('a_tambah');
    }
    public function tambahstaff()
    {
        if (Request()->foto <> "") {
            $data = Request()->foto;
            $fileName = Request()->name  . '.' . $data->extension();
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
            $this->AdminModel->tambah($tambah);
            return redirect()->route('karyawan')->with('pesan', 'Data Berhasil di tambahkan');
        } else {
            $pw = Request()->password;
            $tambah = [
                'name' => Request()->name,
                'email' => Request()->email,
                'password' => Hash::make($pw),
                'level' => Request()->level,
                'divisi' => Request()->divisi,
                'nohp' => Request()->nohp,

            ];
            //dd("var data= " . $data . " var fileName =" . $fileName);
            $this->AdminModel->tambah($tambah);
            return redirect()->route('karyawan')->with('pesan', 'Data Berhasil di tambahkan');
        }
    }
}
