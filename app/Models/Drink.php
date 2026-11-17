<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Drink extends Model
{
    protected $fillable = ["name","amount","price","type_id","package_id"];

    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
}
