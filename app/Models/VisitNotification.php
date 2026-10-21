<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitNotification extends Model
{
    protected $fillable = [
        'guest_id',
        'type',
        'title',
        'message',
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }
}