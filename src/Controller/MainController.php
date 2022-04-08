<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig');
    }

    #[Route('/create', name: 'app_create')]
    public function create(): Response
    {
        return $this->render('main/create.html.twig');
    }

    #[Route('/details{id}', name: 'app_details')]
    public function details($id): Response
    {
        return $this->render('main/details.html.twig');
    }

    #[Route('/edit{id}', name: 'app_edit')]
    public function edit($id): Response
    {
        return $this->render('main/edit.html.twig');
    }
}
