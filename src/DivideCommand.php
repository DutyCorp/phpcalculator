<?php 

namespace Console;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Console\Command;

class DivideCommand extends Command
{
    public function configure()
    {
        $this->setName('divide')
        	->setDescription('Divide all given Numbers')
        	->setHelp('This command allows you to multiply some numbers')
        	->addArgument('numbers', InputArgument::IS_ARRAY, 'numbers to be divided');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->divide($input, $output);
    }
}

?>