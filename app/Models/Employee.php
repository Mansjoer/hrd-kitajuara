<?php

namespace App\Models;

use App\Models\User;
use App\Models\Branch;
use App\Models\Position;
use App\Models\Departement;
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

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'division_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
