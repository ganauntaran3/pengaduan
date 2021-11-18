<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Petugas;

class Response extends Model
{
    use HasFactory;

    protected $guarded = [];

    const CREATED_AT = 'tgl_tanggapan';
    const UPDATED_AT = 'tgl_tanggapan';

    public function petugas(){
        return $this->belongsTo(Petugas::class);
    }

    public function complain(){
        return $this->belongsTo(Complain::class);
    }
}
