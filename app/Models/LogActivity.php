<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    /**

     * Атрибуты, которые можно назначить массово.

     *

     * @var array

     */
    protected  $table= 'log_activity';
    public static  $availableFields= ['subject','method', 'ip', 'user_id', 'to_user_id', 'session_id'];
    protected $fillable = [
        'subject','method', 'ip', 'user_id', 'to_user_id', 'session_id'
        ];


    use HasFactory;
}
