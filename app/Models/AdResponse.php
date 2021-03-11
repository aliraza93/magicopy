<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdResponse extends Model
{
    use HasFactory;

    /**
     * Get the user for the project.
     */
    public function ads()
    {
        return $this->belongsTo(Ads::class);
    }
}
