<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser{

    /*
     * Build a success response
     * @param String | Array $data
     * @param int $code
     * @return Illuminate\Http\JsonResponse
     * */
    public function successResponse($data, $code = Response::HTTP_OK){
        return response()->json(['data'=> $data], $code);
    }

    /*
    * Build an error response
    * @param String $message
    * @param int $code
    * @return Illuminate\Http\JsonResponse

    * */
    public function errorResponse($message, $code = response::HTTP_UNPROCESSABLE_ENTITY){
        return response()->json(['error' => $message, 'code' => $code], $code);

    }
}
