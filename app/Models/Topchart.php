<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topchart extends Model
{
    /**

     * Атрибуты, которые можно назначить массово.

     *

     * @var array

     */
    protected  $table= 'topchart';
    public static  $availableFields= ['id', 'id_gamer', 'voices', 'id_vote', 'created_at' ];
    protected $fillable = [
        'id_gamer',
        'voices',
        'id_vote'
    ];

    use HasFactory;
}
