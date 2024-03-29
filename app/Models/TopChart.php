<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopChart extends Model
{
    /**

     * Атрибуты, которые можно назначить массово.

     *

     * @var array

     */
    protected  $table = 'top_chart';
    public static  $availableFields= ['id', 'id_gamer', 'voices', 'id_vote', 'created_at' ];
    protected $fillable = [
        'id_gamer',
        'voices',
        'id_vote'
    ];

    use HasFactory;

//    public function vote(){
//        return $this->belongsToMany(Vote::class);
//    }
//
//    public function user(){
//        return $this->belongsToMany(User::class);
//    }
}
