<?php

namespace App\Controller;

use App\Entity\Pictures;
use App\Form\PicturesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/pictures")
 */

class PicturesController extends AbstractController
{
    /**
     * @Route("/create", name ="pictures_create")
     */
    public function new(Request $request): Response
    {
        $picture = new Pictures();

        $form =$this->createForm(PicturesType::class, $picture);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($picture);
            $em->flush();

            return $this->redirect('/admin#popup5');
        }

        return $this->render('pictures/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/delete/{id<\d+>}")
     */
    public function delete(Pictures $pictures) 
    {
        $em = $this->getDoctrine()->getManager();

        $em->remove($pictures);
        $em->flush();
        
        return $this->redirect('/admin#popup5');
    }

    /**
     * @Route("/read/{id}")
     */
    public function read(Pictures $picture): Response
    {
        return $this->render('pictures/read.html.twig', [
            'picture' => $picture
        ]);
    }

} 
