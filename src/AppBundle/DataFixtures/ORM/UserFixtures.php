<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Niveau;
use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user2 = new User();

        $encoderFactory = $this->container->get('security.encoder_factory');

        $encoder = $encoderFactory->getEncoder($user);
        $password = $encoder->encodePassword('admin', '');

        $user->setUsername('fartadji');
        $user->setEmail('fartadji@gmail.com');
        $user->setEnabled(true);
        $user->setPassword($password);
        $user->addRole('ROLE_ADMIN');
        $user->setNiveau($this->getReference('level3'));

        $user2->setUsername('sophie');
        $user2->setEmail('s.kontomarkos@gmail.com');
        $user2->setEnabled(true);
        $user2->setPassword($password);
        $user2->addRole('ROLE_ADMIN');
        $user2->setNiveau($this->getReference('level3'));


        $manager->persist($user);
        $manager->persist($user2);
        $manager->flush();
    }

}