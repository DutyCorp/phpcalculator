<?php 

namespace Console;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Console\Command;

class AddCommand extends Command
{
    public function configure()
    {
        $this->setName('add')
        	->setDescription('Add the numbers')
        	->setHelp('This command allows you to add some numbers')
        	->addArgument('numbers', InputArgument::IS_ARRAY, 'numbers to be added');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->add($input, $output);
    }
}

?>