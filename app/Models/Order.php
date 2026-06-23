<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'description',
        'status', 'price', 'deadline',
    ];

    protected function casts(): array
    {
        return [
            'deadline' => 'date',
            'price'    => 'decimal:2',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function messages()
    {
        return $this->hasMany(OrderMessage::class);
    }
}