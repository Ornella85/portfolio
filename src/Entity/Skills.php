<?php
     
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity()
 * @ORM\Table(name="skills")
*/

 class Skills {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id_skills;
    
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
    private $title_skills;

   /**
     * @Assert\Length(
     * min = 1,
     * max = 300,
     * minMessage = "La description de cette compétence doit contenir au moins une lettre",
     * maxMessage = "Le description de cette compétence est trop long"
     * )
     * @Assert\NotBlank(message="Le champs de cette compétence ne peut pas être vide")
     * @ORM\Column(type="string")
     */
    private $content_skills;
    
    

    public function getIdskills()
    {
        return $this->id_skills;
    }

  
    public function setIdskills($id_skills)
    {
        $this->id_skills = $id_skills;

        return $this;
    }

    
    public function getTitleskills()
    {
        return $this->title_skills;
    }

   
    public function setTitleskills($title_skills)
    {
        $this->title_skills = $title_skills;

        return $this;
    }

    
    public function getContentskills()
    {
        return $this->content_skills;
    }

    public function setContentskills($content_skills)
    {
        $this->content_skills = $content_skills;

        return $this;
    }
}