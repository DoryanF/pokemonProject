<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallApiService
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getDataJeux1PokeApi(): array
    {
        $response = $this->client->request(
            'GET',
            'https://pokeapi.co/api/v2/version/?limit=18'
        );

        return $response->toArray();
    }

    public function getDataJeux2PokeApi(): array
    {
        $response = $this->client->request(
            'GET',
            'https://pokeapi.co/api/v2/version/?offset=20&limit=34'
        );

        return $response->toArray();
    }

    public function getTypePokemon(string $urlPokemon)
    {
        $response = $this->client->request(
            'GET',
            $urlPokemon
        );


        $arrayOfData = $response->toArray();

        return $arrayOfData["types"];
    }

    public function getLanguage(string $url)
    {
        $response = $this->client->request(
            'GET',
            $url
        );
        $arrayOfData = $response->toArray();
        if (!empty($arrayOfData['names'])) {
            foreach ($arrayOfData['names'] as $language) {
                if ($language['language']['name'] === "fr") {
                    return $language['name'];
                }
            }
        }else{
            return $arrayOfData['name'];
        }
    }

    public function getVersionGroup(string $url)
    {
        $response = $this->client->request(
            'GET',
            $url
        );
        $arrayOfData = $response->toArray();
        return $arrayOfData['version_group']['url'];
    }

    public function getPokedex(string $urlVersionGroup)
    {
        $response = $this->client->request(
            'GET',
            $urlVersionGroup
        );

        $arrayOfData = $response->toArray();
        $pokedexes = $arrayOfData['pokedexes'];

        $urlPkdex = [];

        foreach ($pokedexes as $pokedexUrl)
        {
            $urlPkdex[] = $pokedexUrl['url'];
        }
        return $urlPkdex;
    }

    public function getPokemons(string $urlPokedex)
    {
        $response = $this->client->request(
            'GET',
            $urlPokedex
        );

        $arrayOfData = $response->toArray();
        $test=[];
        foreach($arrayOfData["pokemon_entries"] as $pokemons)
        {
            $test[] = $pokemons["pokemon_species"];
        }
        return $test;
    }

    public function getPokemonsVarietes(string $urlPokemonSpecies)
    {
        $response = $this->client->request(
            'GET',
            $urlPokemonSpecies
        );
        $tableau=[];
        $arrayOfData = $response->toArray();
        foreach ($arrayOfData["varieties"] as $varieties) {
                $tableau[] = $varieties["pokemon"];
        }
        
        return $tableau;
    }

    public function getSpritePokemons(string $urlPokemon)
    {
        $response = $this->client->request(
            'GET',
            $urlPokemon
        );

        $arrayOfData = $response->toArray();
        return $arrayOfData['sprites']["front_default"];
    }

    public function getPkdex(): array
    {
        $response = $this->client->request(
            'GET',
            'https://pokeapi.co/api/v2/pokedex/1/'
        );
        
        $arrayOfData = $response->toArray();
        $test=[];
        foreach($arrayOfData["pokemon_entries"] as $pokemons)
        {
            $test[] = $pokemons["pokemon_species"];
        }
        dd($test);
        return $test;
    }


    public function getMovesPokemon(string $urlPokemon): array
    {
        $response = $this->client->request(
            'GET',
            $urlPokemon
        );

        $arrayOfData = $response->toArray();

        return $arrayOfData["moves"];
    }

    public function getStatesPokemon(string $urlPokemon): array
    {
        $response = $this->client->request(
            'GET',
            $urlPokemon
        );

        $arrayOfData = $response->toArray();

        return $arrayOfData["stats"];
    }

    public function getAbilitiesPokemon(string $urlPokemon): array
    {
        $response = $this->client->request(
            'GET',
            $urlPokemon
        );

        $arrayOfData = $response->toArray();

        return $arrayOfData["abilities"];
    }

    public function getEffectAbility(string $urlAbility): array
    {
        $response = $this->client->request(
            'GET',
            $urlAbility
        );

        $arrayOfData = $response->toArray();
        
        $array = $arrayOfData["effect_entries"];

        $tabTemp = array();

        foreach ($array as $data) {
            if ($data["language"]["name"] == "en") {
                array_push($tabTemp, $data["effect"]);
            }
        }

        return $tabTemp;

    }
}
