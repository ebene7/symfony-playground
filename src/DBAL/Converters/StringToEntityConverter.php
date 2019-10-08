<?php

namespace App\DBAL\Converters;

use Doctrine\ORM\EntityManager;

/**
 * Class StringToEntityConverter
 * @package App\DBAL\Converters
 */
class StringToEntityConverter extends AbstractConverter
{
    /**  @var EntityManager */
    private $em;

    /**
     * DefaultToPHPValueConverter constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @inheritDoc
     */
    protected function doConvert($value)
    {
        list($class, $id) = explode(':', $value);
        return $this
            ->em
            ->getRepository($class)
            ->find($id);
    }

    /**
     * @inheritDoc
     */
    public function accept($value)
    {
        if (!empty($value)) {
            list($class, $id) = explode(':', $value);
        }
        return !empty($class) && !empty($id);
    }
}
