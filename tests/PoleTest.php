<?php

namespace App\Tests;

use App\Entity\Pole;
use App\Repository\PoleRepository;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class PoleTest extends KernelTestCase
{
    public function testCreatePole(): void
    {
        $em = $this->getContainer()->get(EntityManagerInterface::class);

        $pole = new Pole;
        $pole->setPoleNom('testPole');

        $em->persist($pole);
        $em->flush();

        $this->assertNotEmpty($pole->getId());
    }

    public function testPoleCanBeCreated(): void
    {
        $pole = new Pole();
        $pole->setPoleNom('Test pole');

        $em = $this->getContainer()->get(EntityManagerInterface::class);
        $em->persist($pole);
        $em->flush();

        $this->assertNotEmpty($pole->getId());
    }

    public function testPoleCanBeUpdated(): void
    {
        $pole = new Pole();
        $pole->setPoleNom('Test pole');

        $em = $this->getContainer()->get(EntityManagerInterface::class);
        $em->persist($pole);
        $em->flush();

        $pole->setPoleNom('New test pole');
        $em->flush();

        $this->assertEquals('New test pole', $pole->getPoleNom());
    }

    public function testPoleCanBeDeleted(): void
    {
        $pole = new Pole();
        $pole->setPoleNom('DeletePole');

        $em = $this->getContainer()->get(EntityManagerInterface::class);
        $em->persist($pole);
        $em->flush();

        $em->remove($pole);
        $em->flush();

        $poleRepository = $em->getRepository(Pole::class);
        $pole = $poleRepository->find(['id' => $pole->getId()]);

        $this->assertNull($pole);
    }
}
