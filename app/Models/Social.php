<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;

    /**
     * to specify those fields which are not mass assignable
     *
     * @var array
     */
    protected $guarded = [];
}
