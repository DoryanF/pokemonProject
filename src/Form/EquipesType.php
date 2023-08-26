<?php

namespace App\Form;

use App\Entity\Equipes;
use App\Entity\Pokemons;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EquipesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Pokemon1', EntityType::class, [
                'placeholder' => 'Choisissez votre Pokemon',
                'class' => Pokemons::class,
                'label' => 'Pokemon n°1 : ',
            ])
            ->add('Pokemon2', EntityType::class, [
                'placeholder' => 'Choisissez votre Pokemon',
                'class' => Pokemons::class,
                'label' => 'Pokemon n°2 : ',
            ])
            ->add('Pokemon3', EntityType::class, [
                'placeholder' => 'Choisissez votre Pokemon',
                'class' => Pokemons::class,
                'label' => 'Pokemon n°3 : ',
            ])
            ->add('Pokemon4', EntityType::class, [
                'placeholder' => 'Choisissez votre Pokemon',
                'class' => Pokemons::class,
                'label' => 'Pokemon n°4 : ',
            ])
            ->add('Pokemon5', EntityType::class, [
                'placeholder' => 'Choisissez votre Pokemon',
                'class' => Pokemons::class,
                'label' => 'Pokemon n°5 : ',
            ])
            ->add('Pokemon6', EntityType::class, [
                'placeholder' => 'Choisissez votre Pokemon',
                'class' => Pokemons::class,
                'label' => 'Pokemon n°6 : ',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Equipes::class,
        ]);
    }
}
