<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $users = [
            1 => [
                'username' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => 'admin'
            ],
            2 => [
                'username' => 'User',
                'email' => 'user@gmail.com',
                'password' => 'user'
            ],
            3 => [
                'username' => 'User2',
                'email' => 'user2@gmail.com',
                'password' => 'user2'
            ]
        ];

        foreach ($users as $key => $value) {
            $user = new User();
            $user->setAvatar($this->getReference('avatar_' . $key));
            $user->setUsername($value['username']);
            $user->setEmail($value['email']);
            $user->setPassword($this->encoder->hashPassword($user, $value['password']));
            if ($key === 1) {
                $user->setRoles(['ROLE_ADMIN']);
            } else {
                $user->setRoles(['ROLE_USER']);
            }
            $manager->persist($user);

            // Enregistre en référence
            $this->addReference('user_' . $key, $user);
        }

        $manager->flush();
    }
}
