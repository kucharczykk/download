<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FileUploadController extends AbstractController
{
    /**
     * @Route("/file/upload", name="file_upload")
     */
    public function index()
    {

        if(isset($_POST['submit'])){
            $file = $_FILES['file']['name'];
            print_r($file);
            $fileName = $_FILES['file']['name'];

        }

        return $this->render('file_upload/index.html.twig', [
            'controller_name' => 'FileUploadController',
        ]);
    }
}
