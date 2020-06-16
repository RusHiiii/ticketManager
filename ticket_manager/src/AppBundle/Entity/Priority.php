<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Priority
 *
 * @ORM\Table(name="priority")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PriorityRepository")
 */
class Priority
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
     *
     * @ORM\Column(name="priority_name", type="string", length=255)
     */
    private $priorityName;

    /**
     * @var int
     * @Assert\Range(
     *      min = 0,
     *      max = 100,
     *      minMessage = "Vérifier la limite minimal > {{ limit }}",
     *      maxMessage = "Vérifier la limite maximal < {{ limit }}"
     * )
     * @ORM\Column(name="priority_weight", type="integer")
     */
    private $priorityWeight;


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
     * Set priorityName
     *
     * @param string $priorityName
     *
     * @return Priority
     */
    public function setPriorityName($priorityName)
    {
        $this->priorityName = $priorityName;

        return $this;
    }

    /**
     * Get priorityName
     *
     * @return string
     */
    public function getPriorityName()
    {
        return $this->priorityName;
    }

    /**
     * Set priorityWeight
     *
     * @param integer $priorityWeight
     *
     * @return Priority
     */
    public function setPriorityWeight($priorityWeight)
    {
        $this->priorityWeight = $priorityWeight;

        return $this;
    }

    /**
     * Get priorityWeight
     *
     * @return int
     */
    public function getPriorityWeight()
    {
        return $this->priorityWeight;
    }

    public function __toString() {
      return $this->priorityName;
    }
}
