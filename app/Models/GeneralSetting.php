<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
  use HasFactory;
  protected $fillable = [
    'layout',
    'contact_email',
    'currency_name',
    'currency_icon',
    'time_zone',
    'site_name'
  ];
}
