<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Response;

class Complain extends Model
{
    use HasFactory;

    protected $guarded = [];

    const CREATED_AT = 'tgl_pengaduan';
    const UPDATED_AT = 'tgl_pengaduan';

    public function response(){
        return $this->belongsTo(Response::class);
    }
}
