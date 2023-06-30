<?php

namespace App\DataFixtures;

use App\Entity\CarCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CarCategoryFixtures extends Fixture
{
    const CAR_CATEGORY_REFERENCE1 = 'category-1';
    const CAR_CATEGORY_REFERENCE2 = 'category-2';

    public function load(ObjectManager $manager): void
    {
        $carCategory = new CarCategory();
        $carCategory->setName('Citadine');
        $this->addReference(self::CAR_CATEGORY_REFERENCE1, $carCategory);
        $manager->persist($carCategory);

        $carCategory = new CarCategory();
        $carCategory->setName('Berline');
        $this->addReference(self::CAR_CATEGORY_REFERENCE2, $carCategory);
        $manager->persist($carCategory);

        $manager->flush();
    }
}
