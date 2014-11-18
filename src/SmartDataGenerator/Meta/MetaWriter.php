<?php
namespace SmartData\SmartDataGenerator\Meta;

use SmartData\SmartDataGenerator\Container;

class MetaWriter
{
    const JSON_FILE = 'meta.json';

    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @param array $data
     */
    public function writeMeta(array $data)
    {
        $file = $this->container->getConfig()->getMetaStorage() . DIRECTORY_SEPARATOR . self::JSON_FILE;
        if (!file_exists(dirname($file))) {
            mkdir(dirname($file), 0777, true);
        }
        file_put_contents($file, json_encode($data));
    }
}
