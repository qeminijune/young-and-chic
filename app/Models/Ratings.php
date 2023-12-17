<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    use HasFactory;
    protected $fillable = ['id'];
    public function user() {
        return $this -> belongsTo(User::class, "user_id", "id");
    }
}
