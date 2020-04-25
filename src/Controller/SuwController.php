<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SuwController extends AbstractController
{
    /**
     * @Route("/suw", name="suw")
     */
    public function index()
    {
        return $this->render('suw/index.html.twig', [
            'controller_name' => 'SuwController',
        ]);
    }
}
