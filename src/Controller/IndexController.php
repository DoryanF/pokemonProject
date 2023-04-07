<?php

namespace App\Controller;

use App\Entity\JeuxPkmn;
use App\Entity\Pokedex;
use App\Entity\Pokemons;
use App\Entity\Type;
use App\Repository\JeuxPkmnRepository;
use App\Repository\PokedexRepository;
use App\Repository\PokemonsRepository;
use App\Repository\TypeRepository;
use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route("/", name:"index")]
    public function index( JeuxPkmnRepository $jeuPkmn, CallApiService $callApiService): Response
    {
        $manager = $this->getDoctrine()->getManager();
        $data = $jeuPkmn->findAll();

       return $this->render("index.html.twig",[
           "datas" => $jeuPkmn->findAll()
       ]);
    }

    #[Route("/types", name:"types")]
    public function types(TypeRepository $typePkmn)
    {
        return $this->render("types.html.twig",[
            "types" => $typePkmn->findAll()
        ]);
    }

    #[Route("/teste", name:"teste")]
    public function teste( CallApiService $callApiService, JeuxPkmnRepository $jeuxPkmnRepository, PokedexRepository $pokedexRepository, PokemonsRepository $pokemonsRepository): Response
    {

        // set_time_limit(0);
        // $datas = $callApiService->getPkdex();
        // $manager = $this->getDoctrine()->getManager();
        // dd($datas);
        // foreach ($datas as $data) {
        //     $pokemon = new Pokemons();
        //     $pokemon->setName($data["name"]);
        //     $pokemon->setApiUrl(str_replace("pokemon-species","pokemon",$data["url"]));
        //     $manager->persist($pokemon);
        //     $manager->flush();
        // }
        // $jeuxPkmnsBdd = $jeuxPkmnRepository->findAll();
        // $pokemonsBdd = $pokemonsRepository->findAll();
        // dd($jeuxPkmnsBdd);
        // $pokedexesBdd = $pokedexRepository->findAll();

        // foreach ($pokedexesBdd as $pokedexBdd) {
        //     $pokemons = $callApiService->getPokemons($pokedexBdd->getApiUrl());
        //     foreach ($pokemons as $pokemon) {
        //         $pokemonBdd = $pokemonsRepository->findOneByName($pokemon["name"]);
        //         if ($pokemonBdd instanceof Pokemons) {
        //             $pokemonBdd->addPokedex($pokedexBdd);
        //             $manager->persist($pokemonBdd);
        //             $manager->flush();
        //         }
        //     }
        // }
        
        // foreach ($jeuxPkmnsBdd as $jeuxPkmnBdd) {
        //     $urlVersionJeuxPkmnBdd = $callApiService->getVersionGroup($jeuxPkmnBdd->getApiUrl());
        //     $pokedexVersionJeuxBdd = $callApiService->getPokedex($urlVersionJeuxPkmnBdd);
        //     dd($pokedexVersionJeuxBdd);
            // $pokedex = new Pokedex();
            // $pokedex->setApiUrl($pokedexVersionJeuxBdd);
            // $manager->persist($pokedex);
            // $manager->flush();
            // $pokemonPokedexVersionJeuxBdd = $callApiService->getPokemons($pokedexVersionJeuxBdd);
            
            // foreach ($pokemonPokedexVersionJeuxBdd as $pokemon) {
            //    $pokemonBdd = $pokemonsRepository->findOneByName($pokemon["name"]) ;

            //     if ( $pokemonBdd instanceof Pokemons) {
            //         $pokemonBdd->addPokedex()
            //     }
            // }
        // }
        
        return $this->render("test.html.twig",[]);
    }
}