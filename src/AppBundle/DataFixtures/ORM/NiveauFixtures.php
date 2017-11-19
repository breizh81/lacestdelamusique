<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15/10/17
 * Time: 15:23
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Niveau;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Twig\Node\Node;

class NiveauFixtures extends Fixture
{
public function load(ObjectManager $manager)
{
    $niveaux = ["6ème",
        "5ème",
        "4ème",
        "3ème",
        "3ème CHAM",
        "4ème CHAM",
        "Chorale",
        "0"];
    $i=0;
    foreach ($niveaux as $niveau)
    {
        $level = new Niveau();
        $level->setLibelle($niveau);
        $manager->persist($level);
        // other fixtures can get this object using the 'admin-user' name
        $this->addReference('level'.$i, $level);
        $i++;
    }

    $manager->flush();
}
}