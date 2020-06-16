<?php
/**
 * Created by PhpStorm.
 * User: gumariot
 * Date: 31/05/18
 * Time: 15:54
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Priority;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PriorityFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $this->createPriority($manager);
        $manager->flush();
    }

    private function createPriority($manager){
        $priority = new Priority();
        $priority->setPriorityName("Basse");
        $priority->setPriorityWeight(1);
        $manager->persist($priority);
        $priority = new Priority();
        $priority->setPriorityName("Haute");
        $priority->setPriorityWeight(10);
        $manager->persist($priority);

    }
}