<?php
/**
 * Created by PhpStorm.
 * User: gumariot
 * Date: 31/05/18
 * Time: 15:54
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Customer;
use AppBundle\Entity\Application;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ApplicationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();
        $this->createApplication($manager, $faker);
        $manager->flush();
    }

    private function createApplication($manager, $faker){
        for($i=0; $i<5; $i++){
            $app = new Application();
            $app->setApplicationName($faker->shuffle("florentdamiens"));
            $manager->persist($app);
        }
    }
}