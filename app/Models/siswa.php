<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa'; // nama tabel di dalam database
    protected $fillable = ['nama', 'nim', 'jns', 'agama', 'alamat']; // Field yang hanya dapat di input
}
