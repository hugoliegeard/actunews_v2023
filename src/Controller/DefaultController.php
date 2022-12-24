<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * Page d'Accueil
     * @return Response
     */
    #[Route('/', name: 'default_home', methods: 'GET')]
    public function home(): Response
    {
        return $this->render('default/home.html.twig');
    }

    /**
     * Page Catégorie
     * @param $alias
     * @return Response
     */
    #[Route('/{alias}', name: 'default_category', methods: 'GET')]
    public function category($alias): Response
    {
        // dump($alias);
        return $this->render('default/category.html.twig', [
            'alias' => $alias
        ]);
    }

    /**
     * Page Article
     * ex. https://localhost:8000/politique/greve-sncf_1.html
     * @param $alias
     * @param $id
     * @param $category
     * @return Response
     */
    #[Route('/{category}/{alias}_{id<\d+>}.html', name: 'default_post', methods: 'GET')]
    public function post($alias, $id, $category): Response
    {
        return $this->render('default/post.html.twig', [
            'alias' => $alias,
            'id' => $id,
            'category' => $category,
        ]);
    }

    /**
     * Page Contact
     * @return Response
     */
    public function contact()
    {
        return new Response('<h1>Contact</h1>');
    }
}