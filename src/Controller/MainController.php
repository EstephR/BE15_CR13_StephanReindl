<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Events;
use Symfony\Component\HttpFoundation\Request;

use App\Form\EventType;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $events = $doctrine->getRepository(Events::class)->findAll();
        return $this->render('main/index.html.twig', ['events'=> $events]);
    }

    #[Route('/create', name: 'app_create')]
    public function create(Request $request, ManagerRegistry $doctrine): Response
    {
        $event = new Events();
        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
          $event = $form->getData();
          $em = $doctrine->getManager();
          $em->persist($event);
          $em->flush();

          $this->addFlash(
            'notice',
            'Event has been added!'
          );

          return $this->redirectToRoute('app_main');
        }
        return $this->render('main/create.html.twig', ['form'=>$form->createView()]);
    }

  
    #[Route('/details/{id}', name: 'main_details')]
    public function details(ManagerRegistry $doctrine, $id): Response
    {
      $event = $doctrine->getRepository(Events::class)->find($id);
      return $this->render('main/details.html.twig', ['event' => $event]);
    }

    #[Route('/edit/{id}', name: 'main_edit')]
    public function edit(Request $request, ManagerRegistry $doctrine, $id): Response
    {
      
      $event = $doctrine->getRepository(Events::class)->find($id);
      $form = $this->createForm(EventType::class, $event);
      $form->handleRequest($request);

      if($form->isSubmitted() && $form->isValid()) {
        $event = $form->getData();
        $em = $doctrine->getManager();
        $em->persist($event);
        $em->flush();
        $this->addFlash(
          'notice', 'Event has been edited!'
        );

        return $this->redirectToRoute('app_main');
      } 
      return $this->render('main/edit.html.twig', ['form' => $form->createView()]);
    }

    #[Route('/delete/{id}', name: 'app_delete')]
    public function delete(ManagerRegistry $doctrine, $id): Response
    {
      $em = $doctrine->getManager();
      $event = $em->getRepository(Events::class)->find($id);
      $em->remove($event);
        
        $em->flush();
        $this->addFlash(
            'notice',
            'Your Event has been removed!'
        );
        return $this->redirectToRoute('app_main');
    }
}