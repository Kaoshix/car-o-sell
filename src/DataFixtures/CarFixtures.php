<?php

namespace App\DataFixtures;

use App\Entity\Car;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CarFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 15; $i++) {
            $car = new Car();
            $car->setName('Car ' . $i);
            $car->setCost(30000);
            $car->setNbSeats(5);
            $car->setNbDoors(5);
            $car->setCarCategory($this->getReference('category-1'));
            $manager->persist($car);
        }

        for ($i = 15; $i < 25; $i++) {
            $car = new Car();
            $car->setName('Car ' . $i);
            $car->setCost(10000);
            $car->setNbSeats(5);
            $car->setNbDoors(3);
            $car->setCarCategory($this->getReference('category-2'));
            $manager->persist($car);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CarCategoryFixtures::class,
        ];
    }
}
