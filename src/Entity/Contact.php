<?php
     
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity()
 * @ORM\Table(name="contact")
*/

 class Contact{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id_contact;
    
    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTimeInterface|null
     */
    private $updatedAt;

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
    private $firstname;

   /**
     * @Assert\Length(
     * min = 1,
     * max = 35,
     * minMessage = "Le prénom doit contenir au moins une lettre",
     * maxMessage = "Le prénom est trop long"
     * )
     * @Assert\NotBlank(message="Le champs du prénom ne peut pas être vide")
     * @ORM\Column(type="string")
     */
    private $lastname;
    
    /**
     * @Assert\NotBlank(message="Ce champs doit contenir un numéro au format français")
     * @Assert\Regex(pattern="/[0-9]{10}/")
     * @ORM\Column(type="integer")
     */
    private $phone;

    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     * @ORM\Column(type="string")
     */
    private $email;
 
   /**
     * @Assert\Length(
     * min = 1,
     * max = 100,
     * minMessage = "Le titre doit contenir au moins une lettre",
     * maxMessage = "Le titre est trop long"
     * )
     * @Assert\NotBlank(message="Le champs du titre ne peut pas être vide")
     * @Assert\Regex(pattern="/[a-zA-Z0-9._-éèëêàùûîïç\s]+$/")
     * @ORM\Column(type="string")
     */
    private $title;
    
   /**
     * @Assert\Length(
     * min = 1,
     * max = 500,
     * minMessage = "Votre message doit contenir au moins une lettre",
     * maxMessage = "Votre message est trop long"
     * )
     * @Assert\NotBlank(message="Le champs du message ne peut pas être vide")
     * @Assert\Regex(pattern="/[a-zA-Z0-9._-éèëêàùûîïç\s]+$/")
     * @ORM\Column(type="string")
     */
    private $message;
   

    

    /**
     * Get the value of id_contact
     */ 
    public function getId_contact()
    {
        return $this->id_contact;
    }

    /**
     * Set the value of id_contact
     *
     * @return  self
     */ 
    public function setId_contact($id_contact)
    {
        $this->id_contact = $id_contact;

        return $this;
    }

    /**
     * Get min = 1,
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set min = 1,
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        if (null !== $firstname) {
           
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    /**
     * Get min = 1,
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set min = 1,
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get pattern="/[0-9]{10}/)
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set pattern="/[0-9]{10}/)
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

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
     * Get the value of message
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */ 
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

     /**
     * Get the value of updatedAt
     *
     * @return  \DateTimeInterface|null
     */ 
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set the value of updatedAt
     *
     * @param  \DateTimeInterface|null  $updatedAt
     *
     * @return  self
     */ 
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}