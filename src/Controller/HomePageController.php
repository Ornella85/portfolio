<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contact;
use App\Entity\Skills;
use App\Entity\Experiences;
use App\Entity\Pictures;
use App\Entity\Pdf;
use App\Form\ContactType;
use App\Notification\ContactNotification;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;



class HomePageController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
  
    public function new(Request $request, ContactNotification $notification): Response
    {
        $skills = $this->getDoctrine()->getRepository(Skills::class)->findAll();
        $experiences = $this->getDoctrine()->getRepository(Experiences::class)->findAll();
        $pictures = $this->getDoctrine()->getRepository(Pictures::class)->findAll();
        $pdf = $this->getDoctrine()->getRepository(Pdf::class)->findAll();

        $contact = new Contact();

        $form =$this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

                if ($form->isSubmitted() && $form->isValid()) {
                    $notification->notify($contact);

                    $this->addFlash('success', 'Votre Email m\'a bien été transmis');
                    $em = $this->getDoctrine()->getManager();
        
                    $em->persist($contact);
                    $em->flush();
        
                    return $this->redirect('/#scroll_4');
                }
        
                return $this->render('home.html.twig', [
                    'controller_name' => 'HomePageController',
                    'skills' => $skills,
                    'experiences' => $experiences,
                    'pictures' => $pictures,
                    'pdf' => $pdf,
                    'form' => $form->createView()
                ]);
                }

}