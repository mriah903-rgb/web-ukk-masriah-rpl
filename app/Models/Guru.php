<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{

    protected $table = 'gurus';
    protected $fillable = [
        'nama',
        'nip',
        'nuptk',
        'jenis_kelamin',
        'jabatan',
        'mata_pelajaran',
        'pendidikan_terakhir',
        'foto',
    ];
    public function ekstrakurikuler()
    {
        return $this->hasMany(Ekstrakurikuler::class);
    }
}

