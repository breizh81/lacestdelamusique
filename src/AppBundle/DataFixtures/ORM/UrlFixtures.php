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
        $urls = [
            ['url' => 'https://www.youtube.com/watch?v=Ycg5oOSdpPQ','label'=>'Ofenbach vs. Nick Waterhouse - Katchi', 'type' => 'youtube'],
            ['url' => 'https://www.youtube.com/watch?v=VLPRQUbhIT0','label'=>'SOPRANO - HIRO FEAT. INDILA',  'type' => 'youtube'],
            ['url' => 'https://www.youtube.com/watch?v=DLlF2FMv968','label' =>'Numb/Encore [Live] - Linkin Park & Jay Z','type' => 'youtube'],
            ['url' => 'https://www.youtube.com/watch?v=uelHwf8o7_U','label'=>'Eminem - Love The Way You Lie ft. Rihanna', 'type' => 'youtube']
        ];

        $i = 0;
        foreach ($urls as $url) {
            $lien = new Url();
            $lien->setUrl($url['url']);
            $lien->setType($url['type']);
            $lien->setLabel($url['label']);
            $manager->persist($lien);
            $this->addReference('url' . $i, $lien);

            $i++;
        }
        $manager->flush();

    }



}