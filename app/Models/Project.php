<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'is_active',
        'assignee_id',
        'deadline_date',
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function assignee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assignee_id');
    }

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'created_at' => 'datetime:Y-m-d H:i:s',
        ];
    }

    /**
    * Фильтрация проектов по дэдлайну
    *
    * @param Builder $query
    *
    * @return Builder
    */
    public function scopeExpired(Builder $query): Builder
    {
        return $query->where('deadline_date', '<', date("Y-m-d"));
    }
}
