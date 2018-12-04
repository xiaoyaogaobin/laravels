<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Spatie\Activitylog\Traits\LogsActivity;

class Video extends Model
{
    // 引入动态 跟搜索功能
    use LogsActivity,Searchable;
    //
}
