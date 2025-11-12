<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
     protected $guarded = [];

    public function images()
    {
        return $this->hasMany(UserImage::class);
    }
    public function services()
    {
        return $this->hasMany(UserService::class);
    }

    public function phones()
    {
        return $this->hasMany(UserPhone::class);
    }

    public function languages()
    {
        return $this->hasMany(UserLanguage::class);
    }
}
