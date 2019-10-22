<?php 

namespace Console;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Console\Command;

class HistoryListCommand extends Command
{
    public function configure()
    {
        $this->setName('history:list')
        	->setDescription('Show calculator history')
        	->setHelp('This command allows you view calculator history')
        	->addArgument('commands', InputArgument::IS_ARRAY, 'filter the history by commands');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->listHistory($input, $output);
    }
}

?>