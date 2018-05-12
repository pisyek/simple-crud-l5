<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Student
 *
 * @package App
 * @author Hafiz Suhaimi <pisyek@gmail.com>
 * @copyright 2018 Pisyek Studios
 */
class Student extends Model
{
    protected $fillable = [
        'name',
        'dob',
        'nationality',
        'phone',
    ];
}
