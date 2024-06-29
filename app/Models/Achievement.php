<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_achievements')->withTimestamps();
    }

    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function isUnlockedByUser(User $user)
    {
        // Using UserAchievement model (if applicable):
        return $user->achievements->contains($this->id);

        // Or using a query directly (if not using UserAchievement model):
        // return UserAchievement::where('achievement_id', $this->id)
        //     ->where('user_id', $user->id)
        //     ->exists();
    }

}
