<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Services\StudentService;
use App\Http\Controllers\ApiController;
use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;

class StudentApiController extends ApiController
{
    private StudentService $studentService;

    /**
     * construct
     *
     * @param StudentService $studentService
     */
    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    /**
     * get list Users
     *
     * @param Request $request
     * @param
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index(Request $request)
    {
        $data = $this->studentService->getStudents($request);

        // to do transformer

        return $this->respondSuccess($data, 'get list user success');
    }

    /**
     * Store Student
     *
     * @param StudentStoreRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StudentStoreRequest $request)
    {
        $student = $this->studentService->createStudent($request);

        // to do transformer

        return $this->respondCreated($student, 'create success');
    }

    /**
     * Get a Student
     *
     * @param Student $student
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Student $student)
    {
        // to do transformer

        return $this->respondSuccess($student, 'get list user success');
    }

    /**
     * Update a student
     *
     * @param StudentUpdateRequest $request
     * @param Student $student
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(StudentUpdateRequest $request, Student $student)
    {
        $this->studentService->updateStudent($request, $student);

        return $this->respondSuccess($student, 'get list user success');
    }

    /**
     * Delete a Student
     *
     * @param Student $student
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Student $student)
    {
        $this->studentService->deleteStudent($student);

        return $this->respondNoContent();
    }
}
