<?php
namespace SmartData\Factory;

class Config
{
    /**
     * @var string
     */
    private $providerStorage;

    /**
     * @param array $parameters
     */
    public function __construct(array $parameters = null)
    {
        if (null !== $parameters) {
            $this->set($parameters);
        }
    }

    /**
     * @param $parameters
     * @param null $value
     * @return $this
     */
    public function set($parameters, $value = null)
    {
        if (null !== $value && !is_array($parameters)) {
            $parameters = [$parameters => $value];
        }

        if (is_array($parameters)) {
            foreach ($parameters as $key => $value) {
                $key = strtolower(str_replace('_', '', $key));
                switch ($key) {
                    case 'providerstorage':
                        $this->setProviderStorage($value);
                        break;
                }
            }
        }
        return $this;
    }

    /**
     * @return string
     * @deprecated
     */
    public function getProviderStorage()
    {
        if (null === $this->providerStorage) {
            $this->providerStorage = __DIR__ . "/../../storage";
        }
        return $this->providerStorage;
    }

    public function getStorage()
    {
        return $this->getProviderStorage();
    }

    /**
     * @param string $providerStorage
     * @return $this
     */
    public function setProviderStorage($providerStorage)
    {
        $this->providerStorage = $providerStorage;
        return $this;
    }

    /**
     * @return string
     */
    public function getFactoryStorage()
    {
        return $this->getStorage() . '/factory';
    }
}
