<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $categories = [
            1 => [
                'name' => 'grabs'
            ],
            2 => [
                'name' => 'rotations'
            ],
            3 => [
                'name' => 'flips'
            ],
            4 => [
                'name' => 'rotations désaxées'
            ],
            5 => [
                'name' => 'slides'
            ],
            6 => [
                'name' => 'one foot tricks'
            ],
            7 => [
                'name' => 'old school'
            ]
        ];

        foreach ($categories as $key => $value) {
            $category = new Category();
            $category->setName($value['name']);
            $manager->persist($category);

            // Enregistre en référence
            $this->addReference('category_' . $key, $category);
        }

        $manager->flush();
    }
}
