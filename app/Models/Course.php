<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ]; // khai báo ra tên cột được nhập

    public function getYearCreatedAtAttribute()
    {
        return $this->created_at->format('Y-m-d');
    }
    public function students(): HasMany
    {
        return $this->hasMany( Student::class);
    }
}