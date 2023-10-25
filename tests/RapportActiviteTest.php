<?php

use App\Entity\IndexPole;
use App\Entity\RapportActivite;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class RapportActiviteTest extends KernelTestCase
{
    private ?EntityManagerInterface $entityManager;

    protected function setUp(): void
    {
        parent::setUp();

        self::bootKernel();
        $this->entityManager = self::$kernel->getContainer()->get('doctrine')->getManager();
    }

    public function testRapportActiviteCanBeCreated(): void
    {
        //For create an RapportActivite we need indexPole cause relation is OnetoOne
        $indexPole = new IndexPole(); 
        $rapportActivite = new RapportActivite();

        $indexPole->setIndexNom('IndexNom');
        $indexPole->setUrlIndex('www.test.com');

        $this->entityManager->persist($indexPole);

        $rapportActivite->setMissionPrincipale('Test mission principale');
        $rapportActivite->setIndicateur('Test indicateur');
        $rapportActivite->setStatus('Pas commencé');
        $rapportActivite->setUrlIndex($indexPole); 

        $this->entityManager->persist($rapportActivite);
        $this->entityManager->flush();

        $this->assertNotNull($rapportActivite->getId());
    }

    public function testRapportActiviteCanBeUpdated(): void
    {
        $indexPole = new IndexPole(); // Créez un objet IndexPole ou utilisez un existant
        $indexPole->setIndexNom('IndexNom');
        $indexPole->setUrlIndex('www.test.com');
        $this->entityManager->persist($indexPole);

        $rapportActivite = new RapportActivite();
        $rapportActivite->setMissionPrincipale('Test mission principale');
        $rapportActivite->setIndicateur('Test indicateur');
        $rapportActivite->setStatus('Pas commencé');
        $rapportActivite->setUrlIndex($indexPole);
        // Set other properties as needed

        $this->entityManager->persist($rapportActivite);
        $this->entityManager->flush();

        $rapportActivite->setMissionPrincipale('Updated mission principale');
        $this->entityManager->flush();

        $this->assertEquals('Updated mission principale', $rapportActivite->getMissionPrincipale());
    }

    // public function testRapportActiviteCanBeDeleted(): void
    // {
    //     $rapportActivite = new RapportActivite();
    //     $rapportActivite->setMissionPrincipale('Test mission principale');
    //     $rapportActivite->setIndicateur('Test indicateur');
    //     // Set other properties as needed

    //     $this->entityManager->persist($rapportActivite);
    //     $this->entityManager->flush();

    //     $rapportActiviteId = $rapportActivite->getId();

    //     $this->entityManager->remove($rapportActivite);
    //     $this->entityManager->flush();

    //     $deletedRapportActivite = $this->entityManager->getRepository(RapportActivite::class)->find($rapportActiviteId);

    //     $this->assertNull($deletedRapportActivite);
    // }

    protected function tearDown(): void
    {
        parent::tearDown();

        if ($this->entityManager !== null) {
            $this->entityManager->close();
            $this->entityManager = null;
        }
    }
}
