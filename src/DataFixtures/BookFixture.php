<?php

namespace App\DataFixtures;

use App\Entity\Book;
use App\Entity\Library;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BookFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 20; $i++) {
            $book = new Book();
            $book->setTitle('Livre '.$i);
            $book->setType('Détente');
            $book->setPubDate(new \DateTime());
            $book->setLibrary($this->getReference(Library::class.$i));
            $manager->persist($book);
            $this->addReference(Book::class.$i, $book);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            Library::class,
        ];
    }
}
