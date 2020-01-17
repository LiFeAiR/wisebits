<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Service\Stats;

/**
 * Class StatsController
 * @package App\Controller
 */
class StatsController extends AbstractController
{
    /**
     * @Route("/stats", name="stats", methods={"GET"})
     * @param Stats $service
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function index(Stats $service)
    {
        return $this->json(
            $service->stats()
        );
    }

    /**
     * @Route("/inc", name="inc", methods={"POST"})
     * @param Request $request
     * @param Stats $service
     * @return \Symfony\Component\HttpFoundation\JsonResponse
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
