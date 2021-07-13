<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjadwalan extends Model
{
    protected $table = "penjadwalan";
    use HasFactory;

    protected $fillable = [
        'date', 'waktu_mulai', 'waktu_selesai', 'kode_jam_mulai', 'kode_jam_selesai', 'meet_room', 'topik_skripsi_id'
    ];

    public function topikSkripsi()
    {
        return $this->belongsTo(TopikSkripsi::class, 'topik_skripsi_id');
    }

    public function mahasiswaSubmit()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim_submit', 'nim');
    }

    public function mahasiswaTerpilih()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim_terpilih', 'nim');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
