<?php
/**
 * Created by PhpStorm.
 * User: gumariot
 * Date: 31/05/18
 * Time: 15:54
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Application;
use AppBundle\Entity\Priority;
use AppBundle\Entity\Squad;
use AppBundle\Entity\Ticket;
use AppBundle\Entity\Customer;
use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class TicketFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();
        $priority = $this->createPriority($manager);
        $customer = $this->createCustomer($manager, $faker);
        $userOwner = $this->createUser($manager, $faker);
        $userManager = $this->createUser($manager, $faker);
        $squad = $this->createSquad($manager, $faker);
        $this->createTicket($manager, $faker, $priority, $customer, $userOwner, $userManager, $squad);
        $manager->flush();
    }

    private function createTicket($manager, $faker, $priority, $customer, $userOwner, $userManager, $squad){
        $tick = new Ticket();
        $tick->setTicketDateEnd($faker->dateTime);
        $tick->setTicketDateStart($faker->dateTime);
        $tick->setTicketDescription($faker->text);
        $tick->setTicketLastUpdate($faker->dateTime);
        $tick->setTicketName($faker->name);
        $tick->setTicketNum($faker->randomDigit);
        $tick->setTicketSquad($squad);
        $tick->setTicketCustomer($customer);
        $tick->setTicketPriority($priority);
        $tick->setTicketUserManager($userManager);
        $tick->setTicketUserOwner($userOwner);
        $manager->persist($tick);
    }

    private function createPriority($manager){
        $priority = new Priority();
        $priority->setPriorityName('Urgente');
        $priority->setPriorityWeight(50);
        $manager->persist($priority);
        return $priority;
    }

    private function createCustomer($manager, $faker){
        $customer = new Customer();
        $customer->setCustomerAddress($faker->address);
        $customer->setCustomerEmail($faker->email);
        $customer->setCustomerLastName($faker->lastname);
        $customer->setCustomerName($faker->firstname);
        $customer->setCustomerPhoneNumber($faker->e164PhoneNumber);
        $manager->persist($customer);
        return $customer;
    }

    private function createUser($manager, $faker){
        $user = new User();
        $user->setUsername($faker->firstname);
        $user->setEmail($faker->email);
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

        return $user;
    }

    private function createSquad($manager, $faker){
        $squad = new Squad();
        $squad->setSquadCapacity($faker->randomDigit);
        $squad->setSquadDate($faker->dateTime);
        $squad->setSquadName($faker->company);
        $manager->persist($squad);
        return $squad;
    }

}
