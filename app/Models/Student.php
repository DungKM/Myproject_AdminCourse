<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $attributes['first_name'].' '. $attributes['last_name'],
        );
    }
    protected function age(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                    $date = new DateTime(datetime: $attributes['birthdate']);
                    $now = new DateTime();
                    $interval = $now->diff($date);
                    return $interval->y;
            }
        );
    }
    protected function genderName(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                    return ($attributes['gender'] === 1) ? 'Male' : 'Female';
            }
        );
    }
}

