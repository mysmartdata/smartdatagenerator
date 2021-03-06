<?php

namespace Smart\Geo\Generator\Meta\Command;

use Smart\Geo\Generator\Command;
use Smart\Geo\Generator\Meta\MetaGenerator;
use Smart\Geo\Generator\Meta\MetaPersister;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateMetaCommand extends Command
{
    protected function configure()
    {
        $this->setName('meta:create')
            ->setDescription('Create the meta information JSON file');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->write('Creating the meta information JSON file: ');

        $metaData = (new MetaGenerator($this->getContainer()))->generateAllMeta();
        (new MetaPersister($this->getContainer()))->writeMeta($metaData);
        $output->write('[ <fg=green>OK</fg=green> ]', true);
    }
}
