<?php
namespace SmartData\Factory\SourceCommand;

use SmartData\Factory\Config;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateCommand extends Command
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @param Config $config
     */
    public function __construct(Config $config = null)
    {
        if (null !== $config) {
            $this->config = $config;
        }
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('source:create')
            ->setDescription('Create the sources JSON file');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->write('Creating the sources JSON file: ');
        echo $this->config->getProviderStorage();
        //$output->write('[ <fg=green>OK</fg=green> ]', true);
        //$output->write('[ <error>Failed: Process is already runnning</error> ]', true);
    }
}
