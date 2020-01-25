<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'excerpt',
        'body',
        'user_id'
    ];

    public function user() {
        return $this-> belongsTo(User::class);
        // return $this->belongsTo(User::class, 'user_id'); //override fk name

    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
}
