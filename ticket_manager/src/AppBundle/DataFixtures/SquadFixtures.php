<?php
/**
 * Created by PhpStorm.
 * User: gumariot
 * Date: 31/05/18
 * Time: 15:54
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Application;
use AppBundle\Entity\Squad;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class SquadFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();
        $this->createSquad($manager, $faker);
        $manager->flush();
    }

    private function createSquad($manager, $faker){
        for($i=0; $i<5; $i++){
            $squad = new Squad();
            $squad->setSquadCapacity($faker->randomDigit);
            $squad->setSquadDate($faker->dateTime);
            $squad->setSquadName($faker->company);
            $manager->persist($squad);
        }
    }
}