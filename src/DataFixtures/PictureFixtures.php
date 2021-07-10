<?php

namespace App\DataFixtures;

use App\Entity\Picture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PictureFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $pictures = [
            1 => [
                'fileName' => 'test.jpg',
                'main' => 0,
                'trick' => $this->getReference('trick_1')
            ],
            2 => [
                'fileName' => 'test_2.jpg',
                'main' => 1,
                'trick' => $this->getReference('trick_1')
            ],
            3 => [
                'fileName' => 'test_3.jpg',
                'main' => 0,
                'trick' => $this->getReference('trick_2')
            ],
            4 => [
                'fileName' => 'test_4.jpg',
                'main' => 1,
                'trick' => $this->getReference('trick_2')
            ],
            5 => [
                'fileName' => 'test_5.jpg',
                'main' => 0,
                'trick' => $this->getReference('trick_3')
            ],
            6 => [
                'fileName' => 'test_6.jpg',
                'main' => 1,
                'trick' => $this->getReference('trick_3')
            ]
        ];

        foreach ($pictures as $key => $value) {
            $picture = new Picture();
            $picture->setFileName($value['fileName']);
            $picture->setMain($value['main']);
            $picture->setTrick($value['trick']);
            $manager->persist($picture);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            TrickFixtures::class
        ];
    }
}
