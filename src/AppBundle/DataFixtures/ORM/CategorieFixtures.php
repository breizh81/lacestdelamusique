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
    for($i=0;$i<4;$i++){
        switch ($i){
            case 0:
                $categorie = new Categorie();
                $categorie->setCategorie('Ecoute & analyse');
                $manager->persist($categorie);
                break;
            case 1:
                $categorie = new Categorie();
                $categorie->setCategorie('Projet musical');
                $manager->persist($categorie);
                break;
            case 2:
                $categorie = new Categorie();
                $categorie->setCategorie('Histoire des arts');
                $manager->persist($categorie);
                break;
            case 3:
                $categorie = new Categorie();
                $categorie->setCategorie('Activités');
                $manager->persist($categorie);

                break;
        }
    }
    $manager->flush();
}
}