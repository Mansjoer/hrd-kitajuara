<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubDepartement extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }
}
