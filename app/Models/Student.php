<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * relationship Grade
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function scopeFilterGrade($query, $filter)
    {
        if (is_null($filter)) {
            return $query;
        }

        return $query->join('grades', 'grades.id', '=', 'students.grade_id')
            ->where('grades.name', $filter);
    }
}
