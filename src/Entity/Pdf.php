<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @ORM\Entity()
 * @ORM\Table(name="pdf")
 * @Vich\Uploadable
 */
class Pdf
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_pdf;

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
    private $title_pdf;

    /**
     * @Vich\UploadableField(mapping="pdfs_pdf", fileNameProperty="pdfName")
     * 
     * @var File|null
     */
    private $pdfFile;

    /**
     * @ORM\Column(type="string")
     *
     * @var string|null
     */
    private $pdfName;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTimeInterface|null
     */
    private $updatedAt;

   

    public function getTitlePdf(): ?string
    {
        return $this->title_pdf;
    }

    public function setTitlePdf(?string $title_pdf): self
    {
        $this->title_pdf = $title_pdf;

        return $this;
    }

    public function getPdfFile(): ?File
    {
        return $this->pdfFile;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $pdfFile
     */
    public function setPdfFile(?File $pdfFile = null): void
    {
        $this->pdfFile = $pdfFile;

        if (null !== $pdfFile) {
           
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    /**
     * Get the value of id_pdf
     */ 
    public function getIdpdf()
    {
        return $this->id_pdf;
    }

    /**
     * Set the value of id_pdf
     *
     * @return  self
     */ 
    public function setIdpdf($id_pdf)
    {
        $this->id_pdf = $id_pdf;

        return $this;
    }

    /**
     * Get the value of pdfName
     *
     * @return  string|null
     */ 
    public function getPdfName() :?string
    {
        return $this->pdfName;
    }

    /**
     * Set the value of pdfName
     *
     * @param  string|null  $pdfName
     *
     * @return  self
     */ 
    public function setPdfName(?string $pdfName): void
    {
        $this->pdfName = $pdfName;
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
