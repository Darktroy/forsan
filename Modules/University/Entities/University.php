<?php

namespace Modules\Userdetails\Entities;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $table = 'university';
    protected $primaryKey = 'university_id';
    protected $fillable = [ 'name_ar', 'name_en', 'latitude', 'longitude' ];
}
