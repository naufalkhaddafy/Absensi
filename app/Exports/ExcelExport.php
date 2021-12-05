<?php

namespace App\Exports;


use App\Models\AdminModel as ModelsAdminModel;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExcelExport implements FromCollection, WithMapping, WithHeadings
{
    use Exportable;

    public function __construct($tglawal, $tglakhir)
    {
        $this->tglawal = $tglawal;
        $this->tglakhir = $tglakhir;
        return $this;
    }

    public function collection()
    {
        return ModelsAdminModel::whereBetween('created_at', [$this->tglawal, $this->tglakhir])->get();
    }
    public function map($tbl_rekapan): array
    {

        return [
            date('d F Y', strtotime($tbl_rekapan->created_at)),
            $tbl_rekapan->jam,
            $tbl_rekapan->nama,
            $tbl_rekapan->keterangan,
            $tbl_rekapan->ket_pekerjaan,
            $tbl_rekapan->foto,
            [
                $tbl_rekapan->lat,
                $tbl_rekapan->lng
            ],

        ];
    }
    public function headings(): array
    {
        return [

            'Tanggal',
            'Jam',
            'Nama',
            'Keterangan Absensi',
            'Pekerjaan yang Dilaksanakan',
            'Foto',
            'Lokasi Absensi',

        ];
    }
}
