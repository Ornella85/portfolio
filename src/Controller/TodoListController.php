<?php

namespace App\Controller;

use App\Entity\TodoList;
use App\Form\TodoListType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/todolist")
 */

class TodoListController extends AbstractController
{
    /**
     * @Route("/create", name ="todolist_create")
     */
    public function new(Request $request): Response
    {
        $todoList = new TodoList();

        $form =$this->createForm(TodoListType::class, $todoList);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($todoList);
            $em->flush();

            return $this->redirect('/admin#popup2');
        }

        return $this->render('todo_list/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/edit/{id<\d+>}", name="todolist_edit")
     */
    public function edit(Request $request, TodoList $todoList) 
    {
        $form =$this->createForm(TodoListType::class, $todoList);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirect('/admin#popup2');
        }

        return $this->render('todo_list/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/delete/{id<\d+>}")
     */
    public function delete(TodoList $todoList) 
    {
        $em = $this->getDoctrine()->getManager();

        $em->remove($todoList);
        $em->flush();
        
        return $this->redirect('/admin#popup2');
    }

    /**
     * @Route("/read/{id}")
     */
    public function read(TodoList $todoList): Response
    {
        return $this->render('todo_list/read.html.twig', [
            'todoList' => $todoList
        ]);
    }

} 
