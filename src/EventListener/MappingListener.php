<?php

namespace App\EventListener;

use App\DBAL\Converters\ChainConverter;
use App\DBAL\Event\TypeMapperEventArgs;
use Doctrine\DBAL\Types\Type;
use Symfony\Component\DependencyInjection\Container;
use App\DBAL\Types\EntityString;

/**
 * Class MappingListener
 * @package App\EventListener
 */
class MappingListener
{
    /**
     * @var Container
     */
    private $container;

    /**
     * SomeListener constructor.
     * @param Container $container
     * @return void
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function onKernelRequest()
    {
        if (!Type::hasType('entitystring')) {
            Type::addType('entitystring', EntityString::class);
        }
    }

    /**
     * @param TypeMapperEventArgs $event
     * @return void
     */
    public function onMapping(TypeMapperEventArgs $event)
    {
        $converter = $this->container->get(ChainConverter::class);

        if ($converter->accept($event->getValue())) {
            $event->setResult(
                $converter->convert($event->getValue())
            );
        }
    }
}