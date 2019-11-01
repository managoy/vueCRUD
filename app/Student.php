<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Venturecraft\Revisionable\RevisionableTrait;

class Student extends Model
{
    use RevisionableTrait;
    protected $guarded = [];
}
