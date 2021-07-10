<?php

namespace App\DataFixtures;

use App\Entity\Trick;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class TrickFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $tricks = [
            1 => [
                'name' => 'Stalefih',
                'description' => 'Saisie de la carre backside de la planche entre les deux pieds avec la main arrière',
                'state' => 1,
                'user' => $this->getReference('user_2'),
                'category' => $this->getReference('category_1'),
                'date' => new \DateTime('08/12/2018')
            ],
            2 => [
                'name' => '360',
                'description' => 'Trois six pour un tour complet',
                'state' => 1,
                'user' => $this->getReference('user_1'),
                'category' => $this->getReference('category_2'),
                'date' => new \DateTime('04/10/2019')
            ],
            3 => [
                'name' => 'Seat belt',
                'description' => 'Saisie du carre frontside à l\'arrière avec la main avant',
                'state' => 0,
                'user' => $this->getReference('user_3'),
                'category' => $this->getReference('category_1'),
                'date' => new \DateTime('11/31/2020')
            ]
        ];

        foreach ($tricks as $key => $value) {
            $trick = new Trick();
            $trick->setName($value['name']);
            $trick->setDescription($value['description']);
            $trick->setCreatedAt($value['date']);
            $trick->setState($value['state']);
            $trick->setUser($value['user']);
            $trick->setCategory($value['category']);
            $manager->persist($trick);

            // Enregistre en référence
            $this->addReference('trick_' . $key, $trick);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
            CategoryFixtures::class
        ];
    }
}
