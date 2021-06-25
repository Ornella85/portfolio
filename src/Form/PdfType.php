<?php

namespace App\Form;

use App\Entity\Pdf;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PdfType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('title_pdf', TextType::class, ['label' => 'Titre de votre fichier pdf'])
        ->add('pdfFile', FileType::class, [
            'label' => 'Fichier pdf à ajouter',
            'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pdf::class
        ]);
    }
}
