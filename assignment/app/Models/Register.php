<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;

    protected $table = 'tblemployee';

    public $timestamps = FALSE;

    protected $fillable = [

       'emp_code','first_name','last_name','joining_date','profile_img',

    ];
}
