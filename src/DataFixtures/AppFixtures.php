<?php

namespace App\DataFixtures;

use App\Entity\Pole;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $poles = [
            'Cabinet',
            'Direction générale des services',
            'Pôle rayonnement et vitalité de la ville',
            'Pôle enfance et famille',
            'Pôle coordination et ressources',
            'Pôle aménagement de la ville et bâtiments',
            'Pôle proximité et citoyenneté',
            'Pôle sécurité et qualité de vie',
        ];
        // Insert 8 rows
        for ($i = 0; $i < 8; $i++) {
            $pole = new Pole();
            $pole->setPoleNom($poles[$i]);
            $manager->persist($pole);
        }

        // Flush the changes to the database
        $manager->flush();
    }
}
