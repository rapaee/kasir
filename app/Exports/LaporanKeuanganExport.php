<?php

namespace App\Exports;

use App\Models\LaporanKeuangan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanKeuanganExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return LaporanKeuangan::select('id', 'tanggal_laporan', 'total_pendapatan')->get();
    }
    public function headings(): array
    {
        return [
            'ID',
            'Tanggal',
            'Pendapatan',
        ];
    }
}
