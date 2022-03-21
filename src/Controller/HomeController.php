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
        
       
//         // $contact = new Contact();
//         $form = $this->createForm(ContactType::class);
//         $form->handleRequest($request);
        
// //    $entityManager->persist($contact);
// //         $entityManager->flush();

//         if ($form->isSubmitted() && $form->isValid()) {

        

       
//             $email = (new TemplatedEmail())
//             ->from(new Address('blockchain@gmail.com', 'Blockchain bot'))
//             ->to($contact->getEmail())
//             ->subject('Veuillez confirmer votre addresse mail.')
//             ->htmlTemplate('home/contact-mail.html.twig');

//             // $mailer->send($email);
//             $this->addFlash('success', 'Merci votre message à bien été pris en compte, nous reviendrons vers vous très prochainement');
            
//     }

    return $this->render('home/index.html.twig', [
        'controller_name' => 'HomeController',
     'form' => $form->createView(),
    ]);

    }
}
