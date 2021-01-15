<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cms extends Model
{
    use HasFactory;

    /**
     * @var string $table
     */
    protected $table = 'cms';

    /**
     * @var string[] $fillable
     */
    protected $fillable = [
        'title',
        'description'
    ];

    /**
     * @return HasMany
     */
    public function tags(): HasMany
    {
        return $this->hasMany(CmsTag::class, 'cms_id');
    }
}
