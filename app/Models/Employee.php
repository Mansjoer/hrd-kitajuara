<?php

namespace App\Models;

use App\Models\User;
use App\Models\Branch;
use App\Models\Departement;
use App\Models\SubDepartement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'departement_id');
    }

    public function subDepartement()
    {
        return $this->belongsTo(SubDepartement::class, 'sub_departement_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
