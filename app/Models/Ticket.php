<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Ticket extends Model
{
    protected $fillable = ['title', 'description', 'status', 'status_changed_by_id', 'attachment'];

    // ACTIVITY LOGGING ===================
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['title', 'description', 'status', 'status_changed_by_id', 'attachment'])
            ->logOnlyDirty();
    }
    // END ACTIVITY LOGGING ===================

    // RELATIONS ===================
    public function userObj()
    {
        return $this->hasOne(User::class, 'id', 'user');
    }
    // END RELATIONS ===================

}
