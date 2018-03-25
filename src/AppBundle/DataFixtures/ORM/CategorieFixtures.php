<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15/10/17
 * Time: 00:24
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategorieFixtures extends Fixture
{
public function load(ObjectManager $manager)
{
    $categories = ['Ecoute & analyse',
        'Projet musical',
        'Histoire des arts',
        'Activités'
        ];
$i=0;
    foreach ($categories as $category){
        $categorie = new Categorie();
        $categorie->setLabel($category);
        $manager->persist($categorie);
        $this->addReference('category' . $i, $categorie);

        $i++;
    }

    $manager->flush();
}
}