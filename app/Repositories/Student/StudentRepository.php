<?php

namespace App\Repositories\Student;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;

class StudentRepository implements StudentRepositoryInterface
{
    /**
     * Get list Students
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function getStudents(Request $request)
    {
        return Student::filterGrade($request->input('grade'))->paginate(10);
    }

    /**
     * Create a Student
     *
     * @param StudentStoreRequest $request
     *
     * @return mixed
     */
    public function createStudent(StudentStoreRequest $request)
    {
        $data = $request->only(['name', 'age', 'grade_id']);

        return Student::create($data);
    }

    /**
     * Update a student
     *
     * @param StudentUpdateRequest $request
     * @param Student $student
     *
     * @return bool|mixed
     */
    public function updateStudent(StudentUpdateRequest $request, Student $student)
    {
        $data = $request->only(['name', 'age', 'grade_id']);

        return $student->update($data);
    }

    /**
     * Delete a student
     *
     * @param Student $student
     * @return mixed|void
     */
    public function deleteStudent(Student $student)
    {
        $student->delete();
    }
}
