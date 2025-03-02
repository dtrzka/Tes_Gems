<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Kyslik\ColumnSortable\Sortable;

class Spl_req extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'id',
        'nama',
        'manager',
        'tanggal_lembur',
        'jam_mulai',
        'jam_selesai',
        'durasi',
        'pekerjaan',
        'posisi',
        'status'
    ];

    protected $sortable = [
        'id',
        'nama',
        'manager',
        'tanggal_lembur',
        'jam_mulai',
        'jam_selesai',
        'durasi',
        'pekerjaan',
        'posisi',
        'status'
    ];

    protected $primaryKey = 'id';
    protected $casts = [
        'id' => 'string',
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}
}
