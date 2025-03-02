<?php

namespace App\Exports;

use App\Models\Spl_req;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportPDF implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Spl_req::all();
    }

    public function headings(): array
    {
        return [
            'ID', 'Nama', 'Posisi', 'Tanggal Lembur', 'Jam Mulai', 
            'Jam Selesai', 'Durasi', 'Pekerjaan', 'Manager', 'Status'
        ];
    }
}