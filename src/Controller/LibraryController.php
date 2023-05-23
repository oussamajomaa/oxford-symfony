<?php

namespace App\Controller;

use App\Entity\Author;
use App\Entity\Book;
use App\Entity\Classification;
use App\Entity\Copyst;
use App\Entity\Editor;
use App\Entity\Translator;
use App\Form\ClassificationType;
use App\Repository\BookRepository;
use App\Repository\ClassificationRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LibraryController extends AbstractController
{
    
    #[Route('/library/{page<\d+>?1}/{search?}', name: 'app_library')]
    public function index(
        BookRepository $repo, 
        PaginatorInterface $paginator, 
        $page, $search,
        Request $request
        ): Response
    {
        $title = $request->query->get('title');
        $media = $request->query->get('media');
        $status = $request->query->get('status');
        $source = $request->query->get('source');
        $books = $repo->findAll();
        if ($search == "normal") $books = $repo->findByTitleOrder($title);
        if ($search == "advanced") $books = $repo->advancedSearch($media,$status,$source);
        

        $data = $paginator->paginate($books, $page, 10);
        return $this->render('library/home.html.twig', [
            'books' => $data,
            'title' => $title,

        ]);
    }

    #[Route('/author/{id}', name: 'app_author')]
    public function author(
        Translator $translator,
        Editor $editor,
        Copyst $copyst,
        Author $author
    ): Response {
        return $this->render('library/author.html.twig', [
            'author' => $author,
            'translator' => $translator,
            'copyst' => $copyst,
            'editor' => $editor,
        ]);
    }


    #[Route('/book/{id}', name: 'app_book')]
    public function book(Book $book): Response
    {

        return $this->render('library/book.html.twig', [
            'book' => $book,

        ]);
    }

    #[Route('/classification/{id}', name: 'app_classification')]
    public function classification(
        ClassificationRepository $repo, 
        Classification $classification, 
        $id,
        Request $request
        ): Response
    {
        $form = $this->createForm(ClassificationType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() and $form->isValid()) {
            $id = $form->get('description')->getData();
            // dd($id);
            // return $this->redirectToRoute('app_classification', ['id' => $id]);
            $classification = $repo->find($id);
            return $this->render('library/classification.html.twig', [
                'classification' => $classification,
                'form' => $form->createView()

            ]);
        }
        
        $classification = $repo->find($id);
        return $this->render('library/classification.html.twig', [
            'classification' => $classification,
            'form' => $form->createView()

        ]);
    }
}
