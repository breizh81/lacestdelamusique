<?php
// src/AppBundle/DataFixtures/ORM/UrlTypeFixtures.php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\UrlType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UrlTypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $type = new UrlType();
        $type->setType('youtube');
        $manager->persist($type);
        $manager->flush();
        $type = new UrlType();
        $type->setType('external');
        $manager->persist($type);


        $manager->flush();
    }
}