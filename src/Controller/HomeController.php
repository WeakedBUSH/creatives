<?php

namespace App\Controller;
use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Address;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Doctrine\ORM\EntityManagerInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request, MailerInterface $mailer, EntityManagerInterface $entityManager): Response
    {   
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $contact = $form->getData();
            //envoie du mail
            $email = (new Email())
            ->from('noreplyCreatives@gmail.com')
            ->to($contact->getEmail())
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('DEMANDE DE CONTACT')
            ->text('Creatives support mailer')
            ->html('<p>Nous avons bien reçu votre demande de contact, nous reviendrons vers vous très bientôt!!!</p>');

        $mailer->send($email);
        
        }

    return $this->render('home/index.html.twig', [
        'controller_name' => 'HomeController',
     'form' => $form->createView(),
    ]);

    }
}
