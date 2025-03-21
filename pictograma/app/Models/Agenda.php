<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agenda';
    public $timestamps = false;

    protected $fillable = ['fecha', 'hora', 'idpersona', 'idimagen'];
}
