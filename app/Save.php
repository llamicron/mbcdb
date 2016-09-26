<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Save extends Model
{
  protected $fillable = [
    'counselor_id',
    'user_id',
  ];
}
