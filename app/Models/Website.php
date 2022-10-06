<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property string $email
 * @property int $website_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Website extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'website_id'
    ];

    public function subscriber()
    {
        return $this->belongsToMany(Subscriber::class)->withTimestamps();;
    }

}
