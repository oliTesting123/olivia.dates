<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    // use HasFactory;
    protected $table="dates";
    protected $primaryKey="id";
    protected $filable=[
        'curp',
        'date_at'
        
    ];

    public $timestamps = false;
}
