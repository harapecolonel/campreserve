<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;
    protected $guarded = array('id');

    public static $rules = array(
      'camp_id' => 'required',
      'site_id' => 'required',
      'explanation' => 'required',
      'weekdayrate' => 'required',
      'holidayrate' => 'required',
    );
}
