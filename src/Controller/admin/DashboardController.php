<?php

namespace App\Controller\admin;

use App\Entity\Contact;
use App\Entity\Skills;
use App\Entity\Experiences;
use App\Entity\Pictures;
use App\Entity\Pdf;
use App\Entity\TodoList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class DashboardController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index() : Response
    {
        $skills = $this->getDoctrine()->getRepository(Skills::class)->findAll();
        $experiences = $this->getDoctrine()->getRepository(Experiences::class)->findAll();
        $pictures = $this->getDoctrine()->getRepository(Pictures::class)->findAll();
        $pdf = $this->getDoctrine()->getRepository(Pdf::class)->findAll();
        $todoLists = $this->getDoctrine()->getRepository(TodoList::class)->findAll();
       
        
        return $this->render('admin/dashboard.html.twig', [
            'skills' => $skills,
            'experiences' => $experiences,
            'pictures' => $pictures,
            'pdf' => $pdf,
            'todoLists' => $todoLists,
        ]);
    }
    /** 
     * @Route("/ajax") 
     */ 
    public function ajaxAction(Request $request) {  
    $contact = $this->getDoctrine()->getRepository(Contact::class)->findAll();
    if ($request->isXmlHttpRequest() || $request->query->get('showJson') == 1) {  
       $jsonData = array();  
       $idx = 0;  
       foreach($contact as $contacts) {  
          $temp = array(
             'firstname' => $contacts->getFirstname(),  
             'lastname' => $contacts-> getLastname(),  
             'phone' => $contacts-> getPhone(),  
             'email' => $contacts-> getEmail(),  
             'message' => $contacts-> getMessage(),  
          );   
          $jsonData[$idx++] = $temp;  
       } 
       return new JsonResponse($jsonData); 
    } else { 
        return $this->redirect('/admin'); 
    } 
 }         
 
}
