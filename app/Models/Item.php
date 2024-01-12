<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Item extends Model
{
    use HasFactory;

    protected $table = 'items';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'url',
    ];
}
