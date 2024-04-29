<?php

namespace App\Form;

use App\Entity\Yeti;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType as TypeTextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class NovyYetiType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('jmeno')
        ->add('vyska')
        ->add('vaha')
        ->add('kozich', TypeTextType::class, [
            'label' => 'Kožich'
        ])
        ->add('adresa')
        ->add('vytvoreni', null, [
            'widget' => 'single_text',
        ])
        ->add('submit', SubmitType::class, [
            'label' => 'Uložit',
            'attr' => ['class' => 'btn btn-primary']
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Yeti::class,
        ]);
    }
}
