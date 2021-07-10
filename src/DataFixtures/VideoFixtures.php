<?php

namespace App\DataFixtures;

use App\Entity\Video;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class VideoFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $videos = [
            1 => [
                'fileName' => 'test.jpg',
                'trick' => $this->getReference('trick_1')
            ],
            2 => [
                'fileName' => 'test_2.jpg',
                'trick' => $this->getReference('trick_1')
            ],
            3 => [
                'fileName' => 'test_3.jpg',
                'trick' => $this->getReference('trick_2')
            ],
            4 => [
                'fileName' => 'test_4.jpg',
                'trick' => $this->getReference('trick_2')
            ],
            5 => [
                'fileName' => 'test_5.jpg',
                'trick' => $this->getReference('trick_3')
            ],
            6 => [
                'fileName' => 'test_6.jpg',
                'trick' => $this->getReference('trick_3')
            ]
        ];

        foreach ($videos as $key => $value) {
            $video = new Video();
            $video->setFileName($value['fileName']);
            $video->setTrick($value['trick']);
            $manager->persist($video);
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
