<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Response;

class Petugas extends Model
{
    use HasFactory;

    public function responses(){
        return $this->hasMany(Response::class);
    }
}
