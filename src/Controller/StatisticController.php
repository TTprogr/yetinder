<?php

namespace App\Controller;

use App\Entity\Yeti;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class StatisticController extends AbstractController
{
    #[Route('/statistic', name: 'statistic')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $yetis = $doctrine->getRepository(Yeti::class)->findAll();

        $data = [];
        foreach ($yetis as $yeti) {
            $data[] = [
                'vytvoreni' => $yeti->getVytvoreni()->format('Y-m-d'),
                'vaha' => $yeti->getVaha()
            ];
        }

        return $this->render('statistic/staty.html.twig', [
            'data' => json_encode($data)
        ]);
    }
}
