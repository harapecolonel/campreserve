<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camp extends Model
{
    use HasFactory;
    protected $guarded = array('id');

    public static $rules = array(
      'camp_name' => 'required',
      'address' => 'required',
      'tel' => 'required',
      'explanation' => 'required',
    );
}
