<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;
    public function images() {
        return $this -> hasMany(Image::class, "work_id", "id");
    }
    public function user() {
        return $this -> belongsTo(User::class, "user_id", "id");
    }
    public function comments() {
        return $this -> hasMany(Comments::class, "work_id", "id")->orderBy("created_at", "desc");
    }
}
