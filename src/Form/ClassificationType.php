<?php

namespace App\Form;

use App\Entity\Classification;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClassificationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('description', EntityType::class, [
                'class'     => Classification::class,
                'multiple'  => false,
                'required'  => false,
                'by_reference' => false,
                'label' => false,
                

                'attr'      => [
                    'class' => 'select-classification',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
