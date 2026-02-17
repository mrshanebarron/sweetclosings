<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    protected $guarded = [];

    protected $casts = [
        'subtotal' => 'decimal:2',
        'shipping' => 'decimal:2',
        'tax' => 'decimal:2',
        'total' => 'decimal:2',
        'shipped_at' => 'datetime',
        'delivered_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function giftMessage(): HasOne
    {
        return $this->hasOne(GiftMessage::class);
    }

    public static function generateOrderNumber(): string
    {
        return 'SC-' . strtoupper(substr(uniqid(), -8));
    }

    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'pending' => 'bg-yellow-50 text-yellow-700',
            'processing' => 'bg-blue-50 text-blue-700',
            'shipped' => 'bg-indigo-50 text-indigo-700',
            'delivered' => 'bg-green-50 text-green-700',
            'cancelled' => 'bg-red-50 text-red-700',
            default => 'bg-stone-100 text-stone-600',
        };
    }
}
