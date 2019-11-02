<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="pets")
 */
class Pet /*implements \E7\MetaBundle\Shared\MetaAwareInterface*/
{
//    use \E7\MetaBundle\Entity\Traits\MetaAwareTrait;
//    use \E7\MetaBundle\Shared\MetaDelegateTrait;
    
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
     * @return Pet
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}
