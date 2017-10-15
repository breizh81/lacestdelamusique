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
        $urls = ['https://www.youtube.com/watch?v=Ycg5oOSdpPQ',
            'https://youtu.be/VLPRQUbhIT0',
            'https://www.youtube.com/watch?v=DLlF2FMv968',
            'https://www.youtube.com/watch?v=uelHwf8o7_U'
            ];
        foreach ($urls as $url)
        {
            $lien = new Url();
            $lien->setUrl($url);
            $manager->persist($lien);
        }

        $manager->flush();
    }
}