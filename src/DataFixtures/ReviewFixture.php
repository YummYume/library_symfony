<?php

namespace App\DataFixtures;

use App\Entity\Book;
use App\Entity\Review;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ReviewFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 20; $i++) {
            $review = new Review();
            $review->setScore(random_int(0, 10));
            $review->setComment('Pas mal.');
            $review->setBook($this->getReference(Book::class.$i));
            $manager->persist($review);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            Book::class,
        ];
    }
}
