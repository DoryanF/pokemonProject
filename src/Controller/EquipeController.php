<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Pokemons;
use App\Repository\PokemonsRepository;

class EquipeController extends AbstractController{
    #[Route('/equipe/{id}', name: 'equipe')]
    public function equipe($id, PokemonsRepository $pokemonsRepository)
    {
        $pokemon = $pokemonsRepository->findOneBy(['id' => $id]);
        dd($pokemon);
        return $this->render('equipe.html.twig',[]);
    }
}