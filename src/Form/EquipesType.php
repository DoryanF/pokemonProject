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
            ])
            ->add('Pokemon2', EntityType::class, [
                'placeholder' => 'Choisissez votre Pokemon',
                'class' => Pokemons::class,
            ])
            ->add('Pokemon3', EntityType::class, [
                'placeholder' => 'Choisissez votre Pokemon',
                'class' => Pokemons::class,
            ])
            ->add('Pokemon4', EntityType::class, [
                'placeholder' => 'Choisissez votre Pokemon',
                'class' => Pokemons::class,
            ])
            ->add('Pokemon5', EntityType::class, [
                'placeholder' => 'Choisissez votre Pokemon',
                'class' => Pokemons::class,
            ])
            ->add('Pokemon6', EntityType::class, [
                'placeholder' => 'Choisissez votre Pokemon',
                'class' => Pokemons::class,
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
