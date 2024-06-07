<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    public $guarded = ['id'];

    public function transactions()
    {
    	return $this->hasMany(Transaction::class);
    }
}