<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kursus extends Model
{
    use HasFactory;

    protected $table = "kursuses";
    protected $primary_key = "id";

    protected $fillable = [
       'judul',
       'deskripsi',
       'durasi'
    ];
    public function materis()
    {
        return $this->hasMany(Materi::class);
    }

}
