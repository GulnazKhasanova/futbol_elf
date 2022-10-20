<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class News extends Model
{

    protected  $table= 'news';
    public static  $availableFields= ['id', 'firstname', 'lastname', 'patronymic','phone','login', 'password', 'description', 'birthday', 'role_id', 'image' ,'enter_club_date', 'admin', 'status', 'created_at' ];
    protected $fillable = [ 'firstname',
        'lastname',
        'patronymic',
        'phone',
        'login',
        'password',
        'description',
        'birthday',
        'role_id',
        'image',
        'enter_club_date',
        'admin',
        'status'];


    use HasFactory;



    public function user()
    {
        return $this->belongsTo(User::class);
    }

//    public function getImageUrlAttribute(): string
//    {
//        return Storage::disk('public')->url($this->image);
//    }

//    public function getNews()
//    {
//        return \DB::table($this->table)
//            ->select($this->availableFields)
//            ->get()
//            ->toArray();
//    }
//
//    public function getNewsById(int $id)
//    {
//        return \DB::table($this->table)
//        ->find($id, $this->availableFields);
//
//    }
}
