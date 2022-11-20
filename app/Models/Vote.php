<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{

    protected  $table= 'vote';
    public static  $availableFields= ['id', 'name_vote','date_start','date_finish', 'created_at', 'updated_at' ];
    protected $fillable = [
         'name_vote', 'created_at', 'updated_at','date_start','date_finish'
        ];



    use HasFactory;

    public function topchart(){
        return $this->hasMany(Topchart::class);
    }

}
