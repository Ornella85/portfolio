<?php
     
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="todo_list")
*/  
 class TodoList {

     /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
     private $id;

    /**
     * @Assert\Length(
     * min = 1,
     * max = 35,
     * minMessage = "Le nom doit contenir au moins une lettre",
     * maxMessage = "Le nom est trop long"
     * )
     * @Assert\NotBlank(message="Le champs du nom ne peut pas être vide")
     * @ORM\Column(type="string")
     */
     private $name;

      /**
       * @ORM\Column(type="string")
      * @Assert\NotBlank(message="Le champs de la couleur ne peut pas être vide")
      */
     private $color;

      /**
       * @ORM\OneToMany(targetEntity="App\Entity\Task", mappedBy="list")
       */  
     private $tasks; 

     public function __construct(){
          $this->tasks = new ArrayCollection();
     }

     
     // Getters
    

      public function getName(){
           return $this->name;
      }

     public function getColor(){
          return $this->color;
     }

     //Setters
 
     public function setName($name){
          $this->name = $name;
          return $this;
     }

     public function setColor($color){
          $this->color = $color;
          return $this;
     }

     /**
      * Get the value of tasks
      */ 
     public function getTasks()
     {
          return $this->tasks;
     }

     /**
      * Set the value of tasks
      *
      * @return  self
      */ 
     public function setTasks($tasks)
     {
          $this->tasks = $tasks;

          return $this;
     }

     /**
      * Get the value of id
      */ 
     public function getId()
     {
          return $this->id;
     }

     /**
      * Set the value of id
      *
      * @return  self
      */ 
     public function setId($id)
     {
          $this->id = $id;

          return $this;
     }
 }

?>