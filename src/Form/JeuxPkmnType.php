<?php

namespace App\Form;

use App\Entity\JeuxPkmn;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JeuxPkmnType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('img')
            // ->add('pokedex', ChoiceType::class, [
            //     'choices' => $options['pokedex'],
            //     'choice_label' => function ($pokedex) {
            //         return $pokedex->getName();
            //     },
            //     'placeholder' => 'Select a Pokedex',
            //     'required' => false,
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => JeuxPkmn::class,
        ]);
    }
}
