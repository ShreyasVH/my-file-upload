<?php
namespace app\controllers;

use Phalcon\Http\Request\File;

class UploadController extends BaseController
{
    public function indexAction()
    {
        $output = [];
        if($this->request->hasFiles())
        {
            $folderName = $this->request->getPost('folderName');
            /* @var File[] $files */
            $files = $this->request->getUploadedFiles();
            $file = $files[0];
            $fileName = time() . '.' . $file->getExtension();

            $imageFolder = APP_PATH . 'public/images/';
            if(!file_exists($imageFolder . $folderName))
            {
                mkdir($imageFolder . $folderName);
            }

            $path = $imageFolder . $folderName . '/' . $fileName;
            $url = $_ENV['BASE_URL'] . '/images/' . $folderName . '/' . $fileName;
            $isSuccess = $file->moveTo($path);
            if($isSuccess)
            {
                $output['url'] = $url;
                $output['fileName'] = $fileName;
            }
        }
        else
        {
            throw new \Exception("Invalid Request. File Missing", 400);
        }

        $this->handleCORS();

        return $output;
    }

    public function preflightAction() {
        $this->handleCORS();
    }
}