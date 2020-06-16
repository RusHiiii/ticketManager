<?php
/**
 * Created by PhpStorm.
 * User: gumariot
 * Date: 31/05/18
 * Time: 15:54
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Comment;
use AppBundle\Entity\User;
use AppBundle\Entity\Application;
use AppBundle\Entity\Squad;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class CommentFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();
        $user = $this->createUser($manager, $faker);
        //$this->createComment($manager, $faker, $user);
        $manager->flush();
    }

    private function createComment($manager, $faker, $user){
        $comment = new Comment();
        $comment->setCommentDate($faker->dateTime);
        $comment->setCommentValue($faker->text);
        $manager->persist($comment);
    }

    private function createUser($manager, $faker){
        $user = new User();
        $user->setUsername("fldamiens");
        $user->setEmail('fldamiens@test.fr');
        $user->setPlainPassword('azerty');
        $user->addRole('ROLE_OPERATOR');
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
