<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStudents extends Model
{
    use HasFactory;
    protected $table ='user_students';
    protected $guarded = ['id'];

    // user_id => id dari table user
    // id => id dari table user student
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
