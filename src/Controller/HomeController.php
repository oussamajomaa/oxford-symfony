<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RequestStack;

class HomeController extends AbstractController
{
    
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/home.html.twig');
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(
        Request $request,
        MailerInterface $mailer
    ): Response {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $email = (new Email())
                ->from($form['email']->getData())
                ->to('osmjom@gmail.com')
                ->subject('Message')
                ->text($form['content']->getData());

            $mailer->send($email);
            return $this->redirectToRoute('app_home');
        }
        return $this->render('home/contact.html.twig', [
            'form' => $form->createView()
        ]);
    }

    
}
