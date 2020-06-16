<?php
/**
 * Created by PhpStorm.
 * User: gumariot
 * Date: 31/05/18
 * Time: 15:54
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Customer;
use AppBundle\Entity\Priority;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class CustomerFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();
        $this->createCustomer($manager, $faker);
        $manager->flush();
    }

    private function createCustomer($manager, $faker){
        for($i=0; $i<5; $i++){
            $customer = new Customer();
            $customer->setCustomerAddress($faker->address);
            $customer->setCustomerEmail($faker->email);
            $customer->setCustomerLastName($faker->lastname);
            $customer->setCustomerName($faker->firstname);
            $customer->setCustomerPhoneNumber($faker->e164PhoneNumber);
            $manager->persist($customer);
        }
    }
}