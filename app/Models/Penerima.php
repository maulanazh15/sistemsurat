<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerima extends Model
{
    use HasFactory;

    protected $table = 'penerima';

    protected $fillable = [
        'nama',
        'alamat',
    ];

    public function surat()
    {
        return $this->hasMany(Surat::class, 'penerima_id');
    }
}
