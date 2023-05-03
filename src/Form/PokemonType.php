<?php

namespace App\Form;

use App\Entity\Pokemons;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PokemonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('sprites')
            // ->add('pokedexs', CollectionType::class, [
            //     'entry_type' => PokedexType::class,
            //     'allow_add' => true,
            //     'allow_delete' => true,
            //     'by_reference' => false,
            //     'required' => false,
            // ])
            // ->add('equipes', CollectionType::class, [
            //     'entry_type' => CreateEquipeType::class,
            //     'allow_add' => true,
            //     'allow_delete' => true,
            //     'by_reference' => false,
            //     'required' => false,
            // ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pokemons::class,
        ]);
    }
}
