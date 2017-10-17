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
        $urls = [['url'=>'https://www.youtube.com/watch?v=Ycg5oOSdpPQ','type'=>'youtube'],
            ['url'=>'https://youtu.be/VLPRQUbhIT0','type'=>'youtube'],
            ['url'=>'https://www.youtube.com/watch?v=DLlF2FMv968','type'=>'youtube'],
            ['url'=>'https://www.youtube.com/watch?v=uelHwf8o7_U','type'=>'youtube']
            ];
        foreach ($urls as $url)
        {
            $lien = new Url();
            $lien->setUrl($url['url']);
            $lien->setType($url['type']);
            $manager->persist($lien);
        }

        $manager->flush();
    }
}