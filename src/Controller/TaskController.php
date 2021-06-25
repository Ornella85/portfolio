<?php

namespace App\Controller;

use App\Entity\Task;
use App\Entity\TodoList;
use App\Form\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */

class TaskController extends AbstractController
{
    /**
     * @Route("/task/{id}", name="task_list")
     */
    public function newTask(Request $request, TodoList $todoList): Response
    {
        $task = new Task();

        $form =$this->createForm(TaskType::class, $task);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $task->setCompleted(false);
            $task->setList($todoList);

            $em->persist($task);
            $em->flush();

            return $this->redirect("/admin/todolist/read/{$todoList->getId()}");
        }

        return $this->render('task/task_create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/task/edit/{id<\d+>}")
     */
    public function editTask(Request $request, Task $task) 
    {
        $form =$this->createForm(TaskType::class, $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirect("/admin/todolist/read/{$task->getList()->getId()}");
        }

        return $this->render('task/task_create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/task/delete/{id<\d+>}")
     */
    public function deleteTask(Task $task) 
    {
        $em = $this->getDoctrine()->getManager();

        $em->remove($task);
        $em->flush();
        
        return $this->redirect("/admin/todolist/read/{$task->getList()->getId()}");
    }

    /**
     * @Route("/task/status/{id<\d+>}")
     */
    public function updateStatus(Task $task) {
        $task->setCompleted(!$task->getCompleted());
        $this->getDoctrine()->getManager()->flush();
        
        return $this->redirect("/admin/todolist/read/{$task->getList()->getId()}");
    }

} 
