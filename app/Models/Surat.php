<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $table = 'surat';

    protected $fillable = [
        'judul',
        'isi',
        'pengirim_id',
        'penerima_id',
        'kategori_id',
    ];

    public function pengirim()
    {
        return $this->belongsTo(Pengirim::class);
    }

    public function penerima()
    {
        return $this->belongsTo(Penerima::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
