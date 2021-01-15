<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CmsTag extends Model
{
    use HasFactory;

    /**
     * @var string $table
     */
    protected $table = 'cms_tags';

    public $timestamps;

    /**
     * @var string[] $fillable
     */
    protected $fillable = [
        'cms_id',
        'tag_id'
    ];

    /**
     * @return BelongsTo
     */
    public function cms(): BelongsTo
    {
        return $this->belongsTo(Cms::class);
    }

    /**
     * @return BelongsTo
     */
    public function tag(): BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }
}
