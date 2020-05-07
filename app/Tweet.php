<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Tweet extends Model
{
    use Notifiable;
    protected $primaryKey = 'id';
    protected $fillable = ['tweet', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
