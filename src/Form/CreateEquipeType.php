<?php

namespace App\Form;

use App\Entity\Equipes;
use App\Entity\JeuxPkmn;
use App\Entity\Pokemons;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateEquipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('Pkmn1', dd(CollectionType::class), [
            //     'entry_type' => PokemonType::class,
            //     // 'data_class' => dd(Pokemons::class),
            //     // 'data' => dd(Pokemons::class::getName()),
            //     'allow_add' => true,
            //     'allow_delete' => true,
            //     'by_reference' => false,
            //     'label' => 'Pokemons',
            // ])
            ->add('Pkmn1', SearchableEntityType::class, [
                'class' => Pokemons::class,
            ])
            ->add('Jeux', SearchableEntityType::class, [
                'class' => JeuxPkmn::class,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Equipes::class,
        ]);
    }
}
