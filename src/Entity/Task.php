<?php
     
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity()
 * @ORM\Table(name="task")
*/

class Task{

     /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
    *  @ORM\Column(type="string")
     */
    private $title;

    /**
    *  @ORM\Column(type="boolean")
     */
    private $completed;
    

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TodoList", inversedBy="tasks")
     */
    private $list;

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

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of completed
     */ 
    public function getCompleted()
    {
        return $this->completed;
    }

    /**
     * Set the value of completed
     *
     * @return  self
     */ 
    public function setCompleted($completed) 
    {
        $this->completed = $completed;

        return $this;
    }

    /**
     * Get the value of list
     */ 
    public function getList()
    {
        return $this->list;
    }

    /**
     * Set the value of list
     *
     * @return  self
     */ 
    public function setList($list)
    {
        $this->list = $list;

        return $this;
    }
}