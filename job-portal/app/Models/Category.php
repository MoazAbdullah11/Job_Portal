<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function jobPosts()
{
    return $this->hasMany(JobPost::class);
}

}
