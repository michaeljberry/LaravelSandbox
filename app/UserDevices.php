<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDevices extends Model
{
    protected $table = 'user_devices';
    protected $primaryKey = 'user_device_id';
    protected $guarded = ['created_at', 'modified_at'];
}
