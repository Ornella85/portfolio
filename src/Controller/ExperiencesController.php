<?php

namespace App\Controller;

use App\Entity\Experiences;
use App\Form\ExperiencesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/experiences")
 */

class ExperiencesController extends AbstractController
{
    /**
     * @Route("/create", name ="experiences_create")
     */
    public function new(Request $request): Response
    {
        $experiences = new Experiences();

        $form =$this->createForm(ExperiencesType::class, $experiences);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($experiences);
            $em->flush();

            return $this->redirect('/admin#popup4');
        }

        return $this->render('experiences/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/edit/{id<\d+>}", name="experiences_edit")
     */
    public function edit(Request $request, Experiences $experiences) 
    {
        $form =$this->createForm(ExperiencesType::class, $experiences);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirect('/admin#popup4');
        }

        return $this->render('experiences/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/delete/{id<\d+>}")
     */
    public function delete(Experiences $experiences) 
    {
        $em = $this->getDoctrine()->getManager();

        $em->remove($experiences);
        $em->flush();
        
        return $this->redirect('/admin#popup4');
    }

    // /**
    //  * @Route("/read/{id}")
    //  */
    // public function read(Experiences $experience): Response
    // {
    //     return $this->render('experiences/read.html.twig', [
    //         'experience' => $experience
    //     ]);
    // }

} 
