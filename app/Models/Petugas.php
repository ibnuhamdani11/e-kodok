<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;


    // Nama tabel
    protected $table = 'petugas';

    // Properti yang bisa diisi
    protected $fillable = [
            'fullname',
            'pangkat',
            'jabatan',
            'npwp',
            'satuan',
            'role',  // verifikator, kasi-urji, pembayar
            'no_phone',
            'gender',
            'address',
            'created_at',
            'updated_at', 
            'status'
    ];

    // Jika ada kolom created_at dan updated_at, pastikan timestamps diaktifkan
    public $timestamps = true;
}
