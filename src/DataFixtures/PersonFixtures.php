<?php

namespace App\DataFixtures;

use App\Entity\Person;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PersonFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $person = (new Person())
                ->setLastname($faker->lastName)
                ->setFirstname($faker->firstName)
                ->setBirthdate($faker->dateTimeThisCentury)
            ;

            $manager->persist($person);
        }

        $manager->flush();
    }
}