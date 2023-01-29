<?php

namespace app\controllers;


use Phalcon\Mvc\Controller;

class BaseController extends Controller
{
    public function handleCORS() {
        $this->response
            ->setHeader(
                'Access-Control-Allow-Origin',
                '*'
            )
            ->setHeader(
                'Access-Control-Allow-Methods',
                'GET,PUT,POST,DELETE,OPTIONS'
            )
            ->setHeader(
                'Access-Control-Allow-Headers',
                'Origin, X-Requested-With, Content-Range, ' .
                'Content-Disposition, Content-Type, Authorization'
            )
            ->setHeader(
                'Access-Control-Allow-Credentials',
                'true'
            )
        ;
    }
}