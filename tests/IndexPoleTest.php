<?php

namespace App\Tests;

use App\Entity\Pole;
use App\Entity\IndexPole;
use App\Entity\RapportActivite;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class IndexPoleTest extends KernelTestCase
{

    public function testIndexPoleIsLinkedToRapportActivite(): void
    {
        $rapportActivite = new RapportActivite();
        $indexPole = new IndexPole();

        $indexPole->setIndexNom('Test index');
        $indexPole->setRapportActivite($rapportActivite);

        $this->assertEquals($rapportActivite, $indexPole->getRapportActivite());
    }

    public function testIndexPoleIsLinkedToPole(): void
    {
        $pole = new Pole();
        $pole->setPoleNom('Test pole');

        $indexPole = new IndexPole();
        $indexPole->setIndexNom('Test index');
        $indexPole->setIdPole($pole);

        $this->assertEquals($pole, $indexPole->getIdPole());
    }

    public function testIndexPoleCanBeCreated(): void
    {
        $indexPole = new IndexPole();
        $indexPole->setIndexNom('Test index');
        $indexPole->setUrlIndex('https://example.com');

        $em = $this->getContainer()->get(EntityManagerInterface::class);
        $em->persist($indexPole);
        $em->flush();

        $this->assertNotEmpty($indexPole->getId());
    }

    public function testIndexPoleCanBeUpdated(): void
    {
        $indexPole = new IndexPole();
        $indexPole->setIndexNom('Test index');
        $indexPole->setUrlIndex('https://example.com');

        $em = $this->getContainer()->get(EntityManagerInterface::class);
        $em->persist($indexPole);
        $em->flush();

        $indexPole->setIndexNom('New test index');
        $em->flush();

        $this->assertEquals('New test index', $indexPole->getIndexNom());
    }
    public function testIndexPoleCanBeDeleted(): void
    {
        $indexPole = new IndexPole();
        $indexPole->setIndexNom('Deleted Index56');
        $indexPole->setUrlIndex('https://example.com');

        $em = $this->getContainer()->get(EntityManagerInterface::class);
        $em->persist($indexPole);
        $em->flush();

        $indexPoleRepository = $em->getRepository(IndexPole::class);

        $em->remove($indexPole);
        $em->flush();

        $deletedPole = $indexPoleRepository->find($indexPole->getId());

        $this->assertEmpty($deletedPole);
    }
}
