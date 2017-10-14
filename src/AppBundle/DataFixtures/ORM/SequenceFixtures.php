<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15/10/17
 * Time: 00:00
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Sequence;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class SequenceFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {


        for ($i = 0; $i < 5; $i++) {
            $sequence = new Sequence();
            $sequence->setTitle("Séquence" . $i);
            $sequence->setSummary(" Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam dui lectus, elementum et pulvinar nec, viverra tincidunt mauris. Vivamus at accumsan lacus. Quisque congue nisl justo, a vehicula dolor posuere sit amet. Donec et eros finibus nisi suscipit tristique. Nullam finibus euismod rhoncus. Etiam magna sapien, facilisis eget porta sed, porta id ipsum. Ut non orci id ex varius iaculis et id odio. Nunc fringilla orci ut quam aliquet, nec finibus orci porttitor. Donec laoreet suscipit erat id sollicitudin. Vivamus sed mattis tortor. Etiam laoreet quis velit sit amet rutrum. Etiam pretium odio hendrerit, imperdiet massa sed, pellentesque urna. Donec gravida tellus a egestas ultrices. Nullam ut risus malesuada, condimentum ligula vitae, mattis velit. Sed semper felis vitae hendrerit blandit. Aenean egestas nisi felis, non hendrerit velit iaculis ut.
Donec nec felis arcu. In sed malesuada felis, id gravida sapien. Proin faucibus nisl sit amet orci imperdiet hendrerit at eu libero. Sed blandit nulla vitae pretium gravida. Quisque vel arcu ut risus rutrum imperdiet id ac nunc. Suspendisse cursus lacus vel urna tincidunt convallis. Morbi in nunc elit. Cras a fermentum ipsum. Donec pellentesque ante nec ante lacinia eleifend ut bibendum nulla. ");
            $sequence->setComment("Vestibulum vel erat magna. Sed consequat bibendum dolor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus quis odio id eros semper fringilla eget ac eros. Curabitur ut placerat ligula. Integer pulvinar est posuere diam luctus elementum. Fusce nec lorem finibus, auctor dui at, convallis dolor. Sed in congue dolor. Morbi lobortis libero ut congue efficitur. Mauris feugiat blandit elit et imperdiet.");
            $manager->persist($sequence);
        }

        $manager->flush();
    }
}