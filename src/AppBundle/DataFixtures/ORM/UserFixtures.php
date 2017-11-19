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
        $user3 = new User();
        $user4 = new User();
        $user5 = new User();
        $user6 = new User();
        $user7 = new User();
        $user8 = new User();

        $encoderFactory = $this->container->get('security.encoder_factory');

        $encoder = $encoderFactory->getEncoder($user);
        $password = $encoder->encodePassword('admin', '');

        $user->setUsername('fartadji');
        $user->setEmail('fartadji@gmail.com');
        $user->setEnabled(true);
        $user->setPassword($password);
        $user->addRole('ROLE_ADMIN');
        $user->setNiveau($this->getReference('level7'));
        $user->addEtablissement($this->getReference('etabl1'));

        $user2->setUsername('sophie');
        $user2->setEmail('s.kontomarkos@gmail.com');
        $user2->setEnabled(true);
        $user2->setPassword($password);
        $user2->addRole('ROLE_ADMIN');
        $user2->setNiveau($this->getReference('level7'));
        $user2->addEtablissement($this->getReference('etabl1'));

        $user3->setUsername('eleve1');
        $user3->setEmail('s.kontomarkos3@gmail.com');
        $user3->setEnabled(true);
        $user3->setPassword($password);
        $user3->addRole('ROLE_ADMIN');
        $user3->setNiveau($this->getReference('level3'));
        $user3->addEtablissement($this->getReference('etabl1'));

        $user4->setUsername('eleve2');
        $user4->setEmail('s.kontomarkos4@gmail.com');
        $user4->setEnabled(true);
        $user4->setPassword($password);
        $user4->addRole('ROLE_ADMIN');
        $user4->setNiveau($this->getReference('level1'));
        $user4->addEtablissement($this->getReference('etabl1'));

        $user5->setUsername('eleve3');
        $user5->setEmail('s.kontomarkos5@gmail.com');
        $user5->setEnabled(true);
        $user5->setPassword($password);
        $user5->addRole('ROLE_ADMIN');
        $user5->setNiveau($this->getReference('level1'));
        $user5->addEtablissement($this->getReference('etabl1'));

        $user6->setUsername('eleve4');
        $user6->setEmail('s.kontomarkos6@gmail.com');
        $user6->setEnabled(true);
        $user6->setPassword($password);
        $user6->addRole('ROLE_ADMIN');
        $user6->setNiveau($this->getReference('level2'));
        $user6->addEtablissement($this->getReference('etabl1'));

        $user7->setUsername('eleve5');
        $user7->setEmail('s.kontomarkos7@gmail.com');
        $user7->setEnabled(true);
        $user7->setPassword($password);
        $user7->addRole('ROLE_ADMIN');
        $user7->setNiveau($this->getReference('level4'));
        $user7->addEtablissement($this->getReference('etabl2'));

        $user8->setUsername('eleve6');
        $user8->setEmail('s.kontomarkos8@gmail.com');
        $user8->setEnabled(true);
        $user8->setPassword($password);
        $user8->addRole('ROLE_ADMIN');
        $user8->setNiveau($this->getReference('level5'));
        $user8->addEtablissement($this->getReference('etabl2'));

        $manager->persist($user);
        $manager->persist($user2);
        $manager->persist($user3);
        $manager->persist($user4);
        $manager->persist($user5);
        $manager->persist($user6);
        $manager->persist($user7);
        $manager->persist($user8);
        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }

}