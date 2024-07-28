<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Ticket extends Model
{
    protected $fillable=[""];

    public function getActivitylogOptions()
    {
        return LogOptions::defaults()
            ->logOnly(['text'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }
}
