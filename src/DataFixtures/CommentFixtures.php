<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $comments = [
            1 => [
                'content' => 'Super Figure !',
                'state' => 1,
                'date' => new \DateTime('09/25/2020'),
                'trick' => $this->getReference('trick_1'),
                'user' => $this->getReference('user_1')
            ],
            2 => [
                'content' => 'Les photos sont magnifiques',
                'state' => 1,
                'date' => new \DateTime('10/30/2020'),
                'trick' => $this->getReference('trick_1'),
                'user' => $this->getReference('user_2')
            ],
            3 => [
                'content' => 'Quelqu\'un a déjà réussi à faire cette figure ?',
                'state' => 1,
                'date' => new \DateTime('02/02/2014'),
                'trick' => $this->getReference('trick_2'),
                'user' => $this->getReference('user_3')
            ],
            4 => [
                'content' => 'Pas moi en tout cas :(',
                'state' => 1,
                'date' => new \DateTime('01/31/2016'),
                'trick' => $this->getReference('trick_2'),
                'user' => $this->getReference('user_1')
            ],
            5 => [
                'content' => 'Je crois reconnaitre les Alpes en arrière plan !',
                'state' => 1,
                'date' => new \DateTime('04/08/2018'),
                'trick' => $this->getReference('trick_3'),
                'user' => $this->getReference('user_2')
            ],
            6 => [
                'content' => 'Effectivement on dirait bien',
                'state' => 1,
                'date' => new \DateTime('06/25/2019'),
                'trick' => $this->getReference('trick_3'),
                'user' => $this->getReference('user_3')
            ]
        ];

        foreach ($comments as $key => $value) {
            $comment = new Comment();
            $comment->setContent($value['content']);
            $comment->setState($value['state']);
            $comment->setCreatedAt($value['date']);
            $comment->setTrick($value['trick']);
            $comment->setUser($value['user']);
            $manager->persist($comment);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            TrickFixtures::class,
            UserFixtures::class
        ];
    }
}
