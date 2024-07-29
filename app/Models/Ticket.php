<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Ticket extends Model
{
    protected $fillable=['title','description','status','user','status_changed_by_id','attachment'];

    public function getActivitylogOptions()
    {
        return LogOptions::defaults()
            ->logOnly(['title','description','status','user','status_changed_by_id','attachment'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

    public function user(){
        return $this->belongsTo(User::class,'user','id');
    }
}
