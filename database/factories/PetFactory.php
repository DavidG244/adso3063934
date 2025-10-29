<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */

class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $petNames = [
            "Luna",
            "Max",
            "Bella",
            "Rocky",
            "Coco",
            "Nala",
            "Bruno",
            "Lola",
            "Milo",
            "Kira",
            "Toby",
            "Sasha",
            "Zeus",
            "Maya",
            "Jack",
            "Canela",
            "Mía",
            "Oliver",
            "Simba",
            "Princesa",
            "Mateo",
            "Sofía",
            "Lucas",
            "Valentina",
            "Chispas",
            "Firulais",
            "Doki",
            "Ringo",
            "Trufa",
            "Sol",
            "Rayo",
            "Estrella",
            "Buñuelo",
            "Tinto",
            "Arepa",
            "Guaro",
            "Sancocho",
            "Rogelio",
            "Matilde",
            "Macondo",
            "Chocoramo",
            "Pacho",
            "Bolillo",
            "Pelusa",
            "Pecas",
            "Manchitas",
            "Copito",
            "Pipa",
            "Osito",
            "Gordis",
            "Dulce",
            "Cachetes",
            "Peque",
            "Bolita",
            "Thor",
            "Atenea",
            "Odín",
            "Homero",
            "Frida",
            "Baloo",
            "Dory",
            "Rambo",
            "Fiona",
            "Hércules",
            "Venus",
            "Aquiles",
            "Bart",
            "Leia",
            "Arya",
            "Neo",
            "Nerón",
            "Kenia",
            "Zara",
            "Nina",
            "Rex",
            "Leo",
            "Gus",
            "Benji",
            "Mila",
            "Kai",
            "Enzo",
            "Duquesa",
            "Marqués",
            "Sultán",
            "Valiente",
            "Bandido",
            "Duna",
            "Jade",
            "Lulú",
            "Kenay",
            "Chispi",
            "Pacha",
            "Pili",
            "Chavo",
            "Tita",
            "Tito",
            "Sam",
            "Kimba",
            "Ronco",
            "Cielo"
        ];
        $dogBreeds = [
            "Labrador Retriever",
            "French Bulldog",
            "German Shepherd",
            "Golden Retriever",
            "Yorkshire Terrier",
            "Shih Tzu",
            "Beagle",
            "Siberian Husky",
            "Pug",
            "Rottweiler"
        ];
        $catBreeds = [
            "Domestic Shorthair", 
            "Persian",
            "Siamese",
            "Bengal",
            "Maine Coon",
            "Ragdoll",
            "British Shorthair",
            "Sphynx",
            "Exotic Shorthair",
            "Himalayan"
        ];
        $birdBreeds = [
            "Canary",
            "Cockatiel",
            "Budgerigar", 
            "African Grey Parrot",
            "Lovebird", 
            "Parakeet",
            "Macaw",
            "Cockatoo",
            "Finch",
            "Diamond Dove"
        ];
        $pigBreeds = [
            "Miniature Pig", 
            "Vietnamese Pot-bellied Pig", 
            "Juliana Pig",
            "Kunekune",
            "Göttingen Minipig",
            "Yucatan Minipig",
            "Guinea Hog",
            "Meishan",
            "Ossabaw Island Hog",
            "African Pygmy Hog"
        ];

        $kind = fake()->randomElement(['Dog', 'Cat', 'Pig', 'Bird']);
        switch ($kind) {
            case 'Dog':
                $breed = fake()->randomElement($dogBreeds);
                break;
            case 'Cat':
                $breed = fake()->randomElement($catBreeds);
                break;
            case 'Bird':
                $breed = fake()->randomElement($birdBreeds);
                break;
            case 'Pig':
                $breed = fake()->randomElement($pigBreeds);
                break;
        }

        return [
            'name' => fake()->randomElement($petNames),
            'kind' => $kind,
            'weight' => fake()->numerify('#.#'),
            'age' => fake()->numerify('#'),
            'breed' => $breed,
            'location' => fake()->city(),
            'description' => fake()->sentence(8),
        ];
    }
}
