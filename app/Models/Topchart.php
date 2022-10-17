<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topchart extends Model
{
    protected  $table= 'topchart';
    public static  $availableFields= ['id', 'id_gamer', 'voices', 'id_vote', 'created_at' ];


    use HasFactory;
}
