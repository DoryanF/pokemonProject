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

    
}