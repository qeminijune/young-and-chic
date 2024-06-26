<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    public function user() {
        return $this->belongsTo(User::class, "user_id", "id");
    }
    public function apply() {
        return $this->hasOne(UserApply::class, "user_id", "id");
    }
    public function userApply() {
        return $this->hasMany(UserApply::class, "job_id", "id");
    }
}
