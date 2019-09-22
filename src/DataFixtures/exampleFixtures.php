<?php

namespace App\DataFixtures;

use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class exampleFixtures extends Fixture
{
    /**
     * Fixture loading 100 examples using faker
     * 
     * @param ObjectManager $manager ObjectManager
     */
    public function load(ObjectManager $manager)
    {
//        $faker = Factory::create('fr_FR');
//        for ($i = 0; $i < 100; $i++) {
//            $example = new Example();
//            $example
//                ->setTitle($faker->words(3, true))
//                ->setPrice($faker->numberBetween(100000, 1000000))
//                ->setDescription($faker->sentences(3, true))
//                ->setSurface($faker->numberBetween(20, 350))
//                ->setRooms($faker->numberBetween(2, 10))
//                ->setBedrooms($example->getRooms()-1)
//                ->setFloor($faker->numberBetween(0, 15))
//                ->setHeat($faker->numberBetween(0, count(Property::HEAT)-1))
//                ->setAddress($faker->address)
//                ->setCity($faker->city)
//                ->setPostcode($faker->postcode);
//
//            $manager->persist($example);
//        }
//        $manager->flush();
    }
}
