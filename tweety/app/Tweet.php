<?php

namespace App;

use App\Traits\Likable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tweet extends Model
{
    use Likable;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
