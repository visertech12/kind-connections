<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $guarded = [];

    protected $casts = [
        'replied_at' => 'datetime',
    ];

    public function getStatusBadgeAttribute()
    {
        if ($this->status == 2) return '<span class="badge badge-success">Replied</span>';
        if ($this->status == 1) return '<span class="badge badge-info">Read</span>';
        return '<span class="badge badge-warning">New</span>';
    }
}