<?php

namespace App\Controller;

use App\Entity\Skills;
use App\Form\SkillsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/skills")
 */

class SkillsController extends AbstractController
{
    /**
     * @Route("/create", name ="skills_create")
     */
    public function new(Request $request): Response
    {
        $skills = new Skills();

        $form =$this->createForm(SkillsType::class, $skills);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($skills);
            $em->flush();

            return $this->redirect('/admin#popup6');
        }

        return $this->render('skills/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/edit/{id<\d+>}", name="skills_edit")
     */
    public function edit(Request $request, Skills $skills) 
    {
        $form =$this->createForm(SkillsType::class, $skills);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirect('/admin#popup6');
        }

        return $this->render('skills/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/delete/{id<\d+>}")
     */
    public function delete(Skills $skills) 
    {
        $em = $this->getDoctrine()->getManager();

        $em->remove($skills);
        $em->flush();
        
        return $this->redirect('/admin#popup6');
    }

    // /**
    //  * @Route("/read/{id}")
    //  */
    // public function read(Skills $skill): Response
    // {
    //     return $this->render('skills/read.html.twig', [
    //         'skill' => $skill
    //     ]);
    // }

} 
