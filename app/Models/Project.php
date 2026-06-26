<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'category',
        'technologies', 'image', 'link', 'developer_id',
    ];

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }
}