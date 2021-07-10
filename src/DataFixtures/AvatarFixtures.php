<?php

namespace App\DataFixtures;

use App\Entity\Avatar;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AvatarFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $avatars = [
            1 => [
                'fileName' => 'test.jpg'
            ],
            2 => [
                'fileName' => 'test_2.jpg'
            ],
            3 => [
                'fileName' => 'test_3.jpg'
            ]
        ];

        foreach ($avatars as $key => $value) {
            $avatar = new Avatar();
            $avatar->setFileName($value['fileName']);
            $manager->persist($avatar);

            // Enregistre en référence
            $this->addReference('avatar_' . $key, $avatar);
        }

        $manager->flush();
    }
}
