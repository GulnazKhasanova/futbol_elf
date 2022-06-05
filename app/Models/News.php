<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{

    protected  $table= 'news';
    protected  $availableFields= ['id', 'firstname', 'lastname', 'patronymic', 'enter_club_date', 'created_at' ];

    use HasFactory;

    public function getNews()
    {
        return \DB::table($this->table)
            ->select($this->availableFields)
            ->get()
            ->toArray();
    }

    public function getNewsById(int $id)
    {
        return \DB::table($this->table)
        ->find($id, $this->availableFields);

    }
}
