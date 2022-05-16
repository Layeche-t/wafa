<?php

namespace App\Controller;

use App\Repository\AdRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{

    /**
     * @Route("/", name="homepage")
     */
    public function home(AdRepository $repo)
    {
        $ads = $repo->findBy(
            [],
            [],
            3
        );

        return $this->render(
            'home.html.twig',
            [
                'ads' => $ads
            ]
        );
    }
}
