<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'created_user_id',
        'updated_user_id',
        'deleted_user_id',
        'created_at',
        'updated_at'
    ];

    protected $date = [
        'deleted_at'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class); //for one to many user and post table
    // }
    public function user()
    {
        return $this->belongsTo(User::class, 'created_user_id');
    }
}
