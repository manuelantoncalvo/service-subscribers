<?php

namespace App\Models\AbstractModel;

use App\Traits\Validatable;
use Illuminate\Database\Eloquent\Relations\Pivot;

abstract class BasePivot extends Pivot
{
   use Validatable;
}