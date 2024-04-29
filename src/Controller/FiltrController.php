<?php

namespace App\Controller;

use App\Entity\Yeti;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class FiltrController extends AbstractController
{
    #[Route('/filter', name: 'filter')]
    public function filter(ManagerRegistry $doctrine): Response
    {
        // Získání všech Yetiů z databáze
        $yetis = $doctrine->getRepository(Yeti::class)->findAll();

        // Náhodný výběr Yetiho z seznamu
        $randomYeti = $yetis[array_rand($yetis)];

        // Zobrazení detailů vybraného Yetiho
        return $this->render('filtr/best.html.twig', [
            'yeti' => $randomYeti,
        ]);
    }
}