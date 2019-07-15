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
            $fileName = $file->getName();

            $imageFolder = APP_PATH . 'public/images/';
            if(!file_exists($imageFolder . $folderName))
            {
                mkdir($imageFolder . $folderName);
            }

            $path = $imageFolder . $folderName . '/' . $fileName;
            $url = getenv('BASE_URL') . 'images/' . $folderName . '/' . $fileName;
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
        return $output;
    }
}