<?php

namespace App\DataFixtures;

use App\Entity\Library;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LibraryFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 20; $i++) {
            $library = new Library();
            $library->setName('Librarie '.$i);
            $manager->persist($library);
            $this->addReference(Library::class.$i, $library);
        }

        $manager->flush();
    }
}
