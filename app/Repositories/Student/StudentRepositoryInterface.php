<?php

namespace App\Repositories\Student;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;

interface StudentRepositoryInterface
{
    /**
     * Get list Students
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function getStudents(Request $request);

    /**
     * @param StudentStoreRequest $request
     *
     * Create a Student
     */
    public function createStudent(StudentStoreRequest $request);

    /**
     * Update a student
     *
     * @param StudentUpdateRequest $request
     * @param Student $student
     *
     * @return mixed
     *
     */
    public function updateStudent(StudentUpdateRequest $request, Student $student);

    /**
     * Delete a student
     *
     * @param Student $student
     * @return mixed
     */
    public function deleteStudent(Student $student);
}
