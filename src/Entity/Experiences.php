<?php
     
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity()
 * @ORM\Table(name="experiences")
*/

 class Experiences {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id_experiences;
    
    /**
     * @Assert\Length(
     * min = 1,
     * max = 100,
     * minMessage = "Le titre doit contenir au moins une lettre",
     * maxMessage = "Le titre est trop long"
     * )
     * @Assert\NotBlank(message="Le champs du titre ne peut pas être vide")
     * @ORM\Column(type="string")
     */
    private $title_experiences;


   /**
     * @Assert\Length(
     * min = 1,
     * max = 300,
     * minMessage = "La description de cette experience doit contenir au moins une lettre",
     * maxMessage = "Le description de cette experience est trop long"
     * )
     * @Assert\NotBlank(message="Le champs de cette experience ne peut pas être vide")
     * @ORM\Column(type="string")
     */
    private $content_experiences;
   


    /**
     * Get the value of id_experiences
     */ 
    public function getIdexperiences()
    {
        return $this->id_experiences;
    }

    /**
     * Set the value of id_experiences
     *
     * @return  self
     */ 
    public function setIdexperiences($id_experiences)
    {
        $this->id_experiences = $id_experiences;

        return $this;
    }

    /**
     * Get min = 1,
     */ 
    public function getTitleexperiences()
    {
        return $this->title_experiences;
    }

    /**
     * Set min = 1,
     *
     * @return  self
     */ 
    public function setTitleexperiences($title_experiences)
    {
        $this->title_experiences = $title_experiences;

        return $this;
    }

    /**
     * Get min = 1,
     */ 
    public function getContentexperiences()
    {
        return $this->content_experiences;
    }

    /**
     * Set min = 1,
     *
     * @return  self
     */ 
    public function setContentexperiences($content_experiences)
    {
        $this->content_experiences = $content_experiences;

        return $this;
    }




}