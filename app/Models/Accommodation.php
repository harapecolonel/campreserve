<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory;
    protected $guarded = array('id');
    
    public static $rules = array(
      // 'camp_id' => 'required',
      // 'site_id' => 'required',
      // 'price' => 'required,/
      'name' => 'required',
      'email' => 'required',
      'number_of_users' => 'required',
      'check_in_datetime' => 'required',
      'check_out_date' => 'required',
    );
}
