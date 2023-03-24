<?php

namespace App\Transformers;

use App\Models\Grade;
use League\Fractal\TransformerAbstract;

class GradeTransformer extends TransformerAbstract
{
    /**
     * Transformer data
     *
     * @param Grade $grade
     *
     * @return array
     */
    public function transform(Grade $grade)
    {
        return [
            'name' => $grade->name
        ];
    }
}
