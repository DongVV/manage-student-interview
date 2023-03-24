<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    /**
     * Return generic json response with the given data.
     *
     * @param $data
     * @param int $statusCode
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respond($data, $statusCode = 200, $message = '', $headers = [])
    {
        $newData = [];

        // Check for response without transformer
        if (!isset($data['data'])) {
            $newData['data'] = $data;
        } else {
            $newData = $data;
        }

        $newData['success'] = [
            'message' => $message
        ];

        return response()->json($newData, $statusCode, $headers);
    }

    /**
     * Respond with success.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondSuccess($data, $message = '')
    {
        return $this->respond($data, 200, $message);
    }

    /**
     * Respond with created.
     *
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondCreated($data, $message = '')
    {
        return $this->respond($data, 201, $message);
    }

    /**
     * Respond with no content.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondNoContent()
    {
        return $this->respond(null, 204);
    }
}
