<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\View\ChoiceView;
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


    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['expanded'] = false;
        $view->vars['placeholder'] = 'Choisissez votre Pokémon';
        $view->vars['placeholder_in_choices'] = false;
        $view->vars['multiple'] = false;
        $view->vars['preferred_choices'] = [];
        $view->vars['choices'] = [
            // new ChoiceView([], 'aaza','azda')
        ];
        $view->vars['choice_translation_domain'] = true;
        $view->vars['full_name'] .= '[]';

    }

    public function getBlockPrefix()
    {
        return 'choice';
    }

}