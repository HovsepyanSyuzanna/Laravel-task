<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Website extends Model
{
    use HasFactory;
    protected $table = 'websites';

    protected $fillable = [
        'name',
        'website_id'
    ];

    public  function subscriber() {

        return $this->belongsToMany(Subscriber::class)->withTimestamps();;
    }

}
