<?php

namespace App\DataFixtures;

use App\Entity\IndexPole;
use App\Entity\Pole;
use App\Repository\PoleRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
;

class IndexFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $poles = $manager->getRepository(PoleRepository::class)->findAll();

        $indexData =[
            1 => [
                "Cabinet du Maire",
                "Direction de la Communication",
                "Mission Roubaix Lumières"
            ],
            2 => [
                "Mission d'Appui Stratégique",
                "Mission Développement Durable et Zéro Déchet"
            ],
            3 => [
                "Direction de la Culture",
                "Direction des Sports",
                "Direction de la Jeunesse",
                "Direction du Développement Economique, de l’Insertion, de l’Emploi et de l’Enseignement supérieur",
                "Mission Economie Circulaire",
                "Mission Parc des Sports"
            ],
            4 => [
                "Direction de la Petite Enfance",
                "Direction de l’Enfance",
                "Mission Centres Sociaux"
            ],
            5 => [
                "Secrétariat Général",
                "Direction des Systèmes d’Information",
                "Direction des Ressources Humaines",
                "Direction des Finances et du Contrôle de Gestion",
                "Direction de la Commande Publique et des Affaires Juridiques",
                "Service Suivi et Accompagnement des Associations"
            ],
            6 => [
                "Direction Habitat et Hygiène",
                "Direction Immobilier et Urbanisme",
                "Direction des Grands Projets Urbains",
                "Direction de l’Aménagement et des Constructions Publiques",
                "Direction de la Maintenance, Performance Bâtimentaire",
                "Direction de l’Espace Public et des Mobilités",
                "Mission Grand Boulevard, Centre-ville",
                "Mission Canal-Union-La Lainière"
            ],
            7 => [
                "Direction des Démarches Administratives",
                "Direction de la Mairie des Quartiers Est",
                "Direction de la Mairie des Quartiers Ouest",
                "Direction de la Mairie des Quartiers Nord",
                "Direction de la Mairie des Quartiers Sud",
                "Direction de la Mairie des Quartiers Centre",
                "Direction de la Coordination des Mairies de Quartier, de la Politique de la Ville et de la Participation citoyenne",
                "Mission Gestion Urbaine et Sociale de Proximité"
            ],
            8 => [
                "Direction de la Propreté Urbaine",
                "Direction de la Prévention, de la Sécurité et de la Tranquillité Publique"
            ]
        ];

        // Insert 8 rows
        for ($i = 0; $i < count($indexData); $i++) {
            $indexPole = new IndexPole();
            $pole = new Pole();
            $indexPole->setIndexNom($indexData[$i]["nom"]);
            $indexPole->setUrlIndex($indexData[$i]["url"]);

             $indexPole->setPole($pole);
            $manager->persist($indexPole);
        }

        // Flush the changes to the database
        $manager->flush();
    }
}

