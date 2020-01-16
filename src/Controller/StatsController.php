<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Service\Stats;

class StatsController extends AbstractController
{
    /**
     * @Route("/stats", name="stats", methods={"GET"})
     */
    public function index(Stats $service)
    {
        return $this->json(
            $service->stats()
        );
    }

    /**
     * @Route("/inc", name="inc", methods={"POST"})
     */
    public function inc(Request $request, Stats $service)
    {
        return $this->json(
            $service->inc(
                $request->request->get('code')
            )
        );
    }
}
