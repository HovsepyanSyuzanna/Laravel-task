<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $email
 * @property int $website_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'website_id'
    ];

    public function website()
    {
        return $this->belongsToMany(Website::class)->withTimestamps();
    }
}
