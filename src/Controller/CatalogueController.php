<?php

namespace App\Controller;

use App\Entity\Customer\Catalogue;
use App\Repository\CatalogueRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CatalogueController extends AbstractController
{
    #[Route('/manuscript/{page<\d+>?1}/{search?}', name: 'app_manuscript')]
    public function manuscript(
        CatalogueRepository $repo,
        PaginatorInterface $paginator, 
        $page, $search,
        Request $request
        ): Response
    {
        $catalogues = $repo-> findAll();
        $title = $request->query->get('title');
        if ($title) $catalogues = $repo->findByTitle($title);
        $data = $paginator->paginate($catalogues, $page, 10);
        return $this->render('catalogue/manuscript.html.twig', [
            'catalogues' => $data,
            'title' => $title,
        ]);
    }

    #[Route('/catalogue/{id}', name: 'app_catalogue')]
    public function catalogue(Catalogue $catalogue): Response
    {

        return $this->render('catalogue/catalogue.html.twig', [
            'catalogue' => $catalogue
        ]);
    }
    
}
