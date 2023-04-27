<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory;
    protected $guarded = array('id');
    
    public static $rules = array(
      'check_in_date' => 'required',
      'check_in_time' => 'required',
      'check_out_date' => 'required',
      'number_of_users' => 'required',
      'name' => 'required',
      'email' => 'required',
      // 'camp_id' => 'required',
      // 'site_id' => 'required',
      // 'price' => 'required,
    );
}
