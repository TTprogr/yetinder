<?php

namespace App\Controller;

use App\Entity\Yeti;
use App\Form\NovyYetiType;
use App\Repository\YetiRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class YetiController extends AbstractController
{
    #[Route('/novy', name: 'novy')]
    public function vytvoreni(Request $request, ManagerRegistry $doctrine) {
        // vytvoreni yetiho
        $yeti = new Yeti();
        // odkaz na yetiho formular
        $form = $this->createForm(NovyYetiType::class, $yeti);
        //vyrizeni pozadavku
        $form->handleRequest($request);

        // odeslani formulare do databaze
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->persist($form->getData());
            $em->flush();

            $this->addFlash('message','Yeti je v jeskyni');
        }

        return $this->render('yeti/novy.html.twig', [
            'novy_yeti_form' => $form->createView()
        ]);
    }

    #[Route('/show', name: 'show')]
    public function show(YetiRepository $yetiRepository): Response 
    {
        $yetis = $yetiRepository->findAll();

        return $this->render('yeti/home.html.twig', [
            'yetis' => $yetis
        ]);
    }
}
