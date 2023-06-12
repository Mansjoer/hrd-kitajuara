<?php

namespace App\Models;

use Akuechler\Geoly;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Branch extends Model
{
    use HasFactory, Geoly;

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
