<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FavorisController extends AbstractController
{
    #[Route('/favoris', name: 'app_favoris')]
    public function index(): Response
    {
        return $this->render('favoris/index.html.twig', [
            'controller_name' => 'FavorisController',
        ]);
    }
    // #[Route('/favoris/add', name: 'add_to_favoris')]
    // public function index():
    // {
    //     return $this->render('/index.html.twig', [
    //         'controller_name' => 'FavorisController',
    //     ]);
    // }
}
