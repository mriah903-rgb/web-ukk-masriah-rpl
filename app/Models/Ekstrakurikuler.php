<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    use HasFactory;


    protected $table = 'ekstrakurikuler';


    protected $fillable = [
        'nama_ekskul',
        'pembina',
        'deskripsi',
        'foto',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }




}
