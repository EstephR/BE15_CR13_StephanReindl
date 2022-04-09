<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Events;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $events = $doctrine->getRepository(Events::class)->findAll();
        return $this->render('main/index.html.twig', ['events'=> $events]);
    }

    #[Route('/create', name: 'app_create')]
    public function create(): Response
    {
        return $this->render('main/create.html.twig');
    }

    #[Route('/details/{id}', name: 'main_details')]
    public function details(ManagerRegistry $doctrine, $id): Response
    {
      $event = $doctrine->getRepository(Events::class)->find($id);
      return $this->render('main/details.html.twig', ['event' => $event]);
    }

    #[Route('/edit/{id}', name: 'main_edit')]
    public function edit($id): Response
    {
      return $this->render('main/edit.html.twig');
    }
}
