<?php

namespace App\Services;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Repositories\Student\StudentRepository;

class StudentService
{
    private $studentRepository;

    /**
     * construct
     *
     * @param StudentRepository $studentRepository
     */
    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    /**
     * Get list Students
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function getStudents(Request $request)
    {
        return $this->studentRepository->getStudents($request);
    }

    /**
     * Create a Student
     *
     * @param StudentStoreRequest $request
     *
     * @return mixed
     *
     */
    public function createStudent(StudentStoreRequest $request)
    {
        return $this->studentRepository->createStudent($request);
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
        return $this->studentRepository->updateStudent($request, $student);
    }

    /**
     * Delete a student
     *
     * @param Student $student
     *
     * @return mixed|null
     *
     */
    public function deleteStudent(Student $student)
    {
        return $this->studentRepository->deleteStudent($student);
    }
}
