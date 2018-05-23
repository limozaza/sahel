<?php
/**
 * Created by PhpStorm.
 * User: zakaria
 * Date: 22/05/18
 * Time: 20:57
 */

namespace App\Normalize;


use Symfony\Component\HttpFoundation\Response;

class NotFoundHttpExceptionNormalizer extends AbstractNormalizer
{

    public function normalize(\Exception $exception)
    {
        $result['code'] = Response::HTTP_NOT_FOUND;

        $result['body'] = [
            'code' => Response::HTTP_NOT_FOUND,
            'message' => $exception->getMessage()
        ];

        return $result;
    }
}