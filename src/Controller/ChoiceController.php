<?php

namespace App\Controller;

use App\Entity\JeuxPkmn;
use App\Entity\Pokedex;
use App\Repository\JeuxPkmnRepository;
use App\Repository\PokedexRepository;
use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ChoiceController extends AbstractController
{
    #[Route('/{id}', name: 'choice')]
    public function listPokemon($id,JeuxPkmnRepository $jeuxPkmnRepository, CallApiService $callApiService, Pokedex $pokedex)
    {
        $jeu = $jeuxPkmnRepository->findOneBy(["id"=>$id]);
        $pokedexJeu = $jeu->getPokedex();
        dd($pokedex->getPokemons()->getValues());
        
        $urlVersionGroup = $callApiService->getVersionGroup($jeu->getApiUrl());

        
        return $this->render('choice.html.twig',[
            "jeux" => $jeuxPkmnRepository->findOneBy(["id"=>$id]),
        ]);
    }

}