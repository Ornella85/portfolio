<?php
     
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;


/**
 * @ORM\Entity()
 * @ORM\Table(name="pictures")
 * @Vich\Uploadable
 */
class Pictures
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_pictures;

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
    private $title_pictures;

    /**
     * @Vich\UploadableField(mapping="pictures_image", fileNameProperty="picturesName")
     * 
     * @var File|null
     */
    private $picturesFile;

    /**
     * @ORM\Column(type="string")
     *
     * @var string|null
     */
    private $picturesName;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTimeInterface|null
     */
    private $updatedAt;


    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $picturesFile
     */
    public function setPicturesFile(?File $picturesFile = null): void
    {
        $this->picturesFile = $picturesFile;

        if (null !== $picturesFile) {
           
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getPicturesFile(): ?File
    {
        return $this->picturesFile;
    }

    public function setPicturesName(?string $picturesName): void
    {
        $this->picturesName = $picturesName;
    }

    public function getPicturesName(): ?string
    {
        return $this->picturesName;
    }
   

    /**
     * Get the value of id_pictures
     */ 
    public function getIdpictures()
    {
        return $this->id_pictures;
    }

    /**
     * Set the value of id_pictures
     *
     * @return  self
     */ 
    public function setIdpictures($id_pictures)
    {
        $this->id_pictures = $id_pictures;

        return $this;
    }

    /**
     * Get min = 1,
     */ 
    public function getTitlepictures()
    {
        return $this->title_pictures;
    }

    /**
     * Set min = 1,
     *
     * @return  self
     */ 
    public function setTitlepictures($title_pictures)
    {
        $this->title_pictures = $title_pictures;

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