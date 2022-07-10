<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="app_home")
     */
    public function index(ProductRepository $repo): Response
    {
        $product = $repo->showAllProduct();
        return $this->render('view/content.html.twig',[
            'product'=> $product
        ]);
    }
}
