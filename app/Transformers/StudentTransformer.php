<?php

namespace App\Transformers;

use App\Models\Student;
use League\Fractal\TransformerAbstract;

class StudentTransformer extends TransformerAbstract
{
    protected array $defaultIncludes = ['grade'];

    /**
     * Transformer data
     *
     * @param Student $student
     *
     * @return array
     */
    public function transform(Student $student)
    {
        return [
            'name' => $student->name,
            'age' => $student->age,
        ];
    }

    public function includeGrade(Student $student)
    {
        $grade = $student->grade;
        if (is_null($grade)) {
            return null;
        }

        return $this->primitive($grade->name);
    }
}
