<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Customer
 *
 * @ORM\Table(name="customer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CustomerRepository")
 */
class Customer
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="customer_name", type="string", length=255)
     */
    private $customerName;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="customer_last_name", type="string", length=255)
     */
    private $customerLastName;

    /**
     * @var string
     * @Assert\Email(
    *     message = "L'email '{{ value }}' n'est pas valide.",
    *     checkMX = true
    * )
     * @ORM\Column(name="customer_email", type="string", length=255)
     */
    private $customerEmail;

    /**
     * @var string
     * @Assert\Length(min=10)
     * @Assert\NotBlank()
     * @ORM\Column(name="customer_address", type="string", length=255)
     */
    private $customerAddress;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="customer_phone_number", type="string", length=20)
     */
    private $customerPhoneNumber;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set customerName
     *
     * @param string $customerName
     *
     * @return Customer
     */
    public function setCustomerName($customerName)
    {
        $this->customerName = $customerName;

        return $this;
    }

    /**
     * Get customerName
     *
     * @return string
     */
    public function getCustomerName()
    {
        return $this->customerName;
    }

    /**
     * Set customerLastName
     *
     * @param string $customerLastName
     *
     * @return Customer
     */
    public function setCustomerLastName($customerLastName)
    {
        $this->customerLastName = $customerLastName;

        return $this;
    }

    /**
     * Get customerLastName
     *
     * @return string
     */
    public function getCustomerLastName()
    {
        return $this->customerLastName;
    }

    /**
     * Set customerEmail
     *
     * @param string $customerEmail
     *
     * @return Customer
     */
    public function setCustomerEmail($customerEmail)
    {
        $this->customerEmail = $customerEmail;

        return $this;
    }

    /**
     * Get customerEmail
     *
     * @return string
     */
    public function getCustomerEmail()
    {
        return $this->customerEmail;
    }

    /**
     * Set customerAddress
     *
     * @param string $customerAddress
     *
     * @return Customer
     */
    public function setCustomerAddress($customerAddress)
    {
        $this->customerAddress = $customerAddress;

        return $this;
    }

    /**
     * Get customerAddress
     *
     * @return string
     */
    public function getCustomerAddress()
    {
        return $this->customerAddress;
    }

    /**
     * Set customerPhoneNumber
     *
     * @param string $customerPhoneNumber
     *
     * @return Customer
     */
    public function setCustomerPhoneNumber($customerPhoneNumber)
    {
        $this->customerPhoneNumber = $customerPhoneNumber;

        return $this;
    }

    /**
     * Get customerPhoneNumber
     *
     * @return string
     */
    public function getCustomerPhoneNumber()
    {
        return $this->customerPhoneNumber;
    }

    public function __toString() {
      return $this->customerName;
    }
}
