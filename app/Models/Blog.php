<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Blog extends Model
{
    protected $fillable = [
        'title',
        'content',
        'is_published',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
