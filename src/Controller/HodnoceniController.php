<?php

namespace App\Controller;

use App\Entity\Rating;
use App\Entity\Yeti;
use App\Form\HodnoceniType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HodnoceniController extends AbstractController
{
    #[Route('/hodnoceni/{id}', name: 'hodnoceni')]
    public function rating(Request $request, Yeti $yeti, ManagerRegistry $doctrine, EntityManagerInterface $entityManager): Response
    {
        $rating = new Rating();
        $form = $this->createForm(HodnoceniType::class, $rating);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $rating->setYeti($yeti); // Nastavíme yetiho pro hodnocení

            $entityManager = $doctrine->getManager();
            $entityManager->persist($rating);
            $entityManager->flush();

            $this->addFlash('success', 'Hodnocení bylo uloženo.');
        }

        return $this->render('hodnoceni/hodnoceni.html.twig', [
            'form' => $form->createView(),
            'yeti' => $yeti,
        ]);
    } 
}
