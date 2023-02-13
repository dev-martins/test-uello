<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Freight
 * @package App\Models
 */
class Freight extends Model
{
    use HasFactory;

    protected $fillable = ['freight','from_postcode', 'to_postcode', 'from_weight', 'to_weight', 'cost','client_id'];
}
