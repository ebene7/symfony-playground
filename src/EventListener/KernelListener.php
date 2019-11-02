<?php

namespace App\EventListener;

use E7\FeatureFlagsBundle\Feature\Feature;
use E7\FeatureFlagsBundle\Feature\FeatureBox;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class KernelListener
{
    /** @var FeatureBox */
    private $featureBox;
    
    public function __construct(FeatureBox $featureBox)
    {
        $this->featureBox = $featureBox; 
    }
    
    public function onKernelRequest(GetResponseEvent $event)
    {
        $box = $this->featureBox;
        $box->setDefaultState(true);
        
        $feature = new Feature('foo');
        
        
        
    }
}
