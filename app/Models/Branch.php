<?php

namespace App\Models;

use App\Models\Employee;
use Malhal\Geographical\Geographical;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Branch extends Model
{
    use HasFactory, Geographical;

    protected $guarded = [];

    protected static $kilometers = true;

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }

    public function attendance()
    {
        return $this->hasMany(attendance::class);
    }
}
