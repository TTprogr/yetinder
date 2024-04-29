<?php

namespace App\Form;

use App\Entity\Rating;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HodnoceniType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('value', IntegerType::class, [
            'label' => 'Hodnocení',
            'attr' => ['min' => 1, 'max' => 5], // Nastavíme minimální a maximální hodnotu hodnocení
            
        ])
        ->add('submit', SubmitType::class, [
            'label' => 'Uložit',
            'attr' => ['class' => 'btn btn-primary']
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Rating::class,
        ]);
    }
}
