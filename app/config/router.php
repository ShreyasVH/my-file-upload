<?php

use Phalcon\Mvc\Micro\Collection;

//Default Route
$default = new Collection();
$default->setHandler('app\controllers\IndexController', true);

$default->get('/', 'indexAction');

$application->mount($default);

//For File Upload
$upload = new Collection();
$upload->setHandler('app\controllers\UploadController', true);

$upload->post('/file', 'indexAction');
$upload->options('/file', 'preflightAction');

$application->mount($upload);

$application->after(function() use($application) {
    $application->response->setContentType('application/json', 'UTF-8');
    $output_content = json_encode($application->getReturnedValue(), JSON_UNESCAPED_SLASHES);
    $application->response->setContent($output_content);

    $origin = '*';

    $application->response->setHeader(
                'Access-Control-Allow-Origin', 
                $origin
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
            );
    $application->response->send();
});

$application->notFound(function () use ($application) {
    $application->response->setStatusCode(404, 'Not Found');
    $application->response->sendHeaders();

    $message = 'Action Not Found';
    $application->response->setContent($message);
    $application->response->send();
});

$application->error(function(\Exception $ex) use($application) {
    $content = [
        'status' => 'ERROR',
        'code' => $ex->getCode(),
        'description' => $ex->getMessage()
    ];

    $application->response->setContentType('application/json', 'UTF-8');
    $output_content = json_encode($content, JSON_UNESCAPED_SLASHES);
    $application->response->setContent($output_content);
    $application->response->setStatusCode(400);
    $application->response->send();
    exit;
});