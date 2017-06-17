<?php
/**
 * Created by PhpStorm.
 * User: fre
 * Date: 6/16/17
 * Time: 11:47 PM
 */

namespace ims;

use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{

    /**
     * Returns configuration to merge with application configuration
     *
     * @return array|\Traversable
     */
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}