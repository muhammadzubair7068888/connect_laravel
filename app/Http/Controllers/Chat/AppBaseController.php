<?php

namespace App\Http\Controllers\Chat;

use Illuminate\Support\Facades\Response;

// use InfyOm\Generator\Utils\ResponseUtil;
// use Response;

/**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   @SWG\Info(
 *     title="Laravel Generator APIs",
 *     version="1.0.0",
 *   )
 * )
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
class AppBaseController extends Controller
{
    public function sendResponse($result, $message)
    {
        return Response::json($this->makeResponse($message, $result));
    }

    public function sendError($error, $code = 404)
    {
        return Response::json($this->makeError($error), $code);
    }

    public function sendSuccess($message)
    {
        return Response::json(['message' => $message, 'success' => true], 200);
    }

    public function sendData($data)
    {
        return Response::json($data, 200);
    }

    public function makeResponse($message, $data)
    {
        return [
            'success' => true,
            'data'    => $data,
            'message' => $message,
        ];
    }

    /**
     * @param string $message
     * @param array  $data
     *
     * @return array
     */
    public function makeError($message, array $data = [])
    {
        $res = [
            'success' => false,
            'message' => $message,
        ];

        if (!empty($data)) {
            $res['data'] = $data;
        }

        return $res;
    }
}
