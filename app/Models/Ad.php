<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = ['title', 'description', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
