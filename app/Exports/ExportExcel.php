<?php

namespace App\Exports;

use App\Models\Spl_req;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportExcel implements FromQuery, WithHeadings
{
    use Exportable;
    private $columns = ['id',
        'nama',
        'manager',
        'tanggal_lembur',
        'jam_mulai',
        'jam_selesai',
        'durasi',
        'pekerjaan',
        'posisi',
        'status'];

    public function query()
    {
        return Spl_req::query()->select($this->columns);
    }

    public function headings(): array
    {
        return $this->columns;
    }
}
