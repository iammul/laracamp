<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Checkout;
use Auth;

class Camp extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'price'];

    public function getIsRegisteredAttribute()
    {
        if (!Auth::check()) {
            return false;
        }

        return Checkout::whereCampId($this->id)
            ->whereUserId(Auth::id())
            ->exists();
    }
}
