<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15/10/17
 * Time: 00:10
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Url;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UrlFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 5; $i++) {

            $url = new Url();
            $url->setUrl('https://www.youtube.com/watch?v=Ycg5oOSdpPQ');
            $manager->persist($url);
        }

        $manager->flush();
    }
}