<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'user_id', 'work_id'];
    public function user() {
        return $this -> belongsTo(User::class, "user_id", "id");
    }
    public function work() {
        return $this -> belongsTo(Work::class, "work_id", "id");
    }
}
