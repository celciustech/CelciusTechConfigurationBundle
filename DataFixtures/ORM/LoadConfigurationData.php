<?php

namespace CelciusTech\ConfigurationBundle\DataFixtures\ORM;

use CelciusTech\CoreBundle\DataFixtures\DataFixture;
use Doctrine\Common\Persistence\ObjectManager;
use CelciusTech\ConfigurationBundle\Entity\Configuration;

class LoadConfigurationData extends DataFixture
{
    public function load(ObjectManager $manager)
    {
        $defaults = $this->container->getParameter('ct_config_defaults');
        foreach ($defaults as $key => $value) {
            $config = new Configuration();
            $config->setKey($key);
            $config->setValue($value);
            $manager->persist($config);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}
