<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
//use E7\MetaBundle\Shared\UserInterface;

/**
 * Class Person
 * @package App\Entity
 *
 * @ORM\Entity()
 * @ORM\Table(name="persons")
 */
class Person /*implements UserInterface*/
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Person
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}
