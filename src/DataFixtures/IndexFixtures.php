<?php

namespace App\DataFixtures;

use App\Entity\IndexPole;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
;

class IndexFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $index = [
            ["nom" => "Cabinet du Maire", "url" => "https://example.com/cabinet-du-maire"],
            ["nom" => "Mission d'Appui Stratégique", "url" => "https://example.com/mission-dappui-strategique"],
            ["nom" => "Direction de la Culture", "url" => "https://example.com/direction-de-la-culture"],
            ["nom" => "Direction de la Petite Enfance", "url" => "https://example.com/direction-de-la-petite-enfance"],
            ["nom" => "Secrétariat Général", "url" => "https://example.com/secretariat-general"],
            ["nom" => "Direction Habitat et Hygiène", "url" => "https://example.com/direction-habitat-et-hygiene"],
            ["nom" => "Direction des Démarches Administratives", "url" => "https://example.com/direction-des-demarches-administratives"],
            ["nom" => "Direction de la Propreté Urbaine", "url" => "https://example.com/direction-de-la-proprete-urbaine"],
            ["nom" => "Direction de la Communication", "url" => "https://example.com/direction-de-la-communication"],
            ["nom" => "Mission Développement Durable et Zéro Déchet", "url" => "https://example.com/mission-developpement-durable-et-zero-dechet"],
            ["nom" => "Direction des Sports", "url" => "https://example.com/direction-des-sports"],
            ["nom" => "Direction de l’Enfance", "url" => "https://example.com/direction-de-lenfance"],
            ["nom" => "Direction des Systèmes d'Information", "url" => "https://example.com/direction-des-systemes-dinformation"],
            ["nom" => "Direction Immobilier et Urbanisme", "url" => "https://example.com/direction-immobilier-et-urbanisme"],
            ["nom" => "Direction de la Mairie des Quartiers Est", "url" => "https://example.com/direction-de-la-mairie-des-quartiers-est"],
            ["nom" => "Direction de la Prévention, de la Sécurité et de la Tranquillité Publique", "url" => "https://example.com/direction-de-la-prevention-de-la-securite-et-de-la-tranquillite-publique"],
            ["nom" => "Mission Roubaix Lumières", "url" => "https://example.com/mission-roubaix-lumieres"],
            ["nom" => "Direction de la Jeunesse", "url" => "https://example.com/direction-de-la-jeunesse"],
            ["nom" => "Mission Centres Sociaux", "url" => "https://example.com/mission-centres-sociaux"],
            ["nom" => "Direction des Ressources Humaines", "url" => "https://example.com/direction-des-ressources-humaines"],
            ["nom" => "Direction des Grands Projets Urbains", "url" => "https://example.com/direction-des-grands-projets-urbains"],
            ["nom" => "Direction de la Mairie des Quartiers Ouest", "url" => "https://example.com/direction-de-la-mairie-des-quartiers-ouest"],
            ["nom" => "Direction du Développement Economique, de l’Insertion, de l’Emploi et de l’Enseignement supérieur", "url" => "https://example.com/direction-du-developpement-economique-de-linsertion-de-lemploi-et-de-lenseignement-superieur"],
            ["nom" => "Direction des Finances et du Contrôle de Gestion", "url" => "https://example.com/direction-des-finances-et-du-controle-de-gestion"],
            ["nom" => "Direction de l’Aménagement et des Constructions Publiques", "url" => "https://example.com/direction-de-lamenagement-et-des-constructions-publiques"],
            ["nom" => "Direction de la Mairie des Quartiers Nord", "url" => "https://example.com/direction-de-la-mairie-des-quartiers-nord"],
            ["nom" => "Mission Economie Circulaire", "url" => "https://example.com/mission-economie-circulaire"],
            ["nom" => "Direction de la Commande Publique et des Affaires Juridiques", "url" => "https://example.com/direction-de-la-commande-publique-et-des-affaires-juridiques"],
            ["nom" => "Direction de la Maintenance, Performance Bâtimentaire", "url" => "https://example.com/direction-de-la-maintenance-performance-batimentaire"],
            ["nom" => "Direction de la Mairie des Quartiers Sud", "url" => "https://example.com/direction-de-la-mairie-des-quartiers-sud"],
            ["nom" => "Mission Parc des Sports", "url" => "https://example.com/mission-parc-des-sports"],
            ["nom" => "Service Suivi et Accompagnement des Associations", "url" => "https://example.com/service-suivi-et-accompagnement-des-associations"],
            ["nom" => "Direction de l’Espace Public et des Mobilités", "url" => "https://example.com/direction-de-lespace-public-et-des-mobilites"],
            ["nom" => "Direction de la Mairie des Quartiers Centre", "url" => "https://example.com/direction-de-la-mairie-des-quartiers-centre"],
            ["nom" => "Mission Grand Boulevard, Centre-ville", "url" => "https://example.com/mission-grand-boulevard-centre-ville"],
            ["nom" => "Direction de la Coordination des Mairies de Quartier, de la Politique de la Ville et de la Participation citoyenne", "url" => "https://example.com/direction-de-la-coordination-des-mairies-de-quartier-de-la-politique-de-la-ville-et-de-la-participation-citoyenne"],
            ["nom" => "Mission Canal-Union-La Lainière", "url" => "https://example.com/mission-canal-union-la-lainiere"],
            ["nom" => "Mission Gestion Urbaine et Sociale de Proximité", "url" => "https://example.com/mission-gestion-urbaine-et-sociale-de-proximite"],
        ];        
        
        // Insert 8 rows
        for ($i = 0; $i < count($index); $i++) {
            $indexPole = new IndexPole();
            $indexPole->setIndexNom($index[$i]["nom"]);
            $indexPole->setUrlIndex($index[$i]["url"]);
            $manager->persist($indexPole);
        }

        // Flush the changes to the database
        $manager->flush();
    }
}

