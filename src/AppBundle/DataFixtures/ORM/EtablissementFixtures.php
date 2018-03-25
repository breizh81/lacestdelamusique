<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10/11/17
 * Time: 10:29
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Etablissement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class EtablissementFixtures extends Fixture
{
public function load(ObjectManager $manager)
{
    $etablissements = ["Collège 1",
        "Collège 2",
        "Collège 3"];
    $i=0;
    foreach ($etablissements as $etablissement){
        $etabl = new Etablissement();
        $etabl->setLabel($etablissement);
        $manager->persist($etabl);
        $this->addReference('etabl'.$i, $etabl);
        $i++;
    }
    $manager->flush();
}
    public function getOrder()
    {
        return 1;
    }
}