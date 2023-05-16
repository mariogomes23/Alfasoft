<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;
    protected $fillable =["pessoa_id","number","codeCountry"];
    
    public function pessoa()
    {
        return $this->belongTo(Pessoa::class);
    }
}
