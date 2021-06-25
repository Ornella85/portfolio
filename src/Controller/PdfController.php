<?php

namespace App\Controller;

use App\Entity\Pdf;
use App\Form\PdfType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/pdf")
 */
class PdfController extends AbstractController
{
 
    /**
     * @Route("/create", name ="pdf_create")
     */
    public function new(Request $request): Response
    {
        $pdf = new Pdf();

        $form =$this->createForm(PdfType::class, $pdf);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($pdf);
            $em->flush();

            return $this->redirect('/admin');
        }

        return $this->render('pdf/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/delete/{id<\d+>}")
     */
    public function delete(Pdf $pdf) 
    {
        $em = $this->getDoctrine()->getManager();

        $em->remove($pdf);
        $em->flush();
        
        return $this->redirectToRoute('admin');
    }

    /**
     * @Route("/read/{id}")
     */
    public function read(Pdf $pdf): Response
    {
        return $this->render('pdf/read.html.twig', [
            'pdf' => $pdf
        ]);
    }

} 

