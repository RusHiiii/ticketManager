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
use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();
        $this->createUser($manager, $faker);
        $manager->flush();
    }

    private function createUser($manager, $faker){
        $user = new User();
        $user->setUsername("admin");
        $user->setEmail('fldamidedeens@test.fr');
        $user->setPlainPassword('admin');
        $user->addRole('ROLE_ADMIN');
        $user->setEnabled(true);
        $user->setUserPhoneNumber($faker->e164PhoneNumber);

        $app = new Application();
        $app->setApplicationName('a');
        $manager->persist($app);
        $user->setUserApplication($app);

        $squad = new Squad();
        $squad->setSquadName('GR1');
        $squad->setSquadDate($faker->dateTime);
        $squad->setSquadCapacity(5);
        $manager->persist($squad);
        $user->setUserSquad($squad);

        $manager->persist($user);
    }
}
