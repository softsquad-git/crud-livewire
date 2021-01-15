<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    /**
     * @var string $table
     */
    protected $table = 'tags';

    public $timestamps;

    /**
     * @var string[] $fillable
     */
    protected $fillable = [
        'name'
    ];
}
