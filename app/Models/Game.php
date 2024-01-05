<?php

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['user_id', 'money', 'money_per_click'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

