<?php

namespace App\Form;

use App\Entity\Pokedex;
use App\Entity\Pokemons;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\ChoiceList\View\ChoiceView;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchableEntityType extends AbstractType
{

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setRequired('class');
        $resolver->setDefaults([
            'compound' => false,
            'multiple' => false,
        ]);
    }

    // public function buildForm(FormBuilderInterface $builder, array $options)
    // {
    //     $builder->addModelTransformer(new CallbackTransformer(
    //         function (Collection $value):array{
    //             return $value->map(fn ($d) => (string)$d->getID())->toArray();
    //         },
    //         function (array $id): Collection {

    //         }

            
    //     ));
    // }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        // dd($form->getData());
        $view->vars['expanded'] = false;
        $view->vars['placeholder'] = 'Choisissez votre Pokémon';
        $view->vars['placeholder_in_choices'] = false;
        $view->vars['multiple'] = false;
        $view->vars['preferred_choices'] = [];
        $view->vars['choices'] = [new ChoiceView([],'teste', 'teste')];
        $view->vars['choice_translation_domain'] = false;
        $view->vars['full_name'] .= '[]';

    }

    public function getBlockPrefix()
    {
        return 'choice';
    }

    private function choices(Collection $value)
    {
        // dd($value);
        return $value
        ->map(fn ($d) => new ChoiceView($d, (string)$d->getNom(), (string)$d))
        ->toArray();
    }
}