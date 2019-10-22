<?php 

namespace Calculator;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Calculator\Command;

class SubtractCommand extends Command
{
    public function configure()
    {
        $this->setName('subtract')
        	->setDescription('Subtract all given Numbers')
        	->setHelp('This command allows you to subtract some numbers')
        	->addArgument('numbers', InputArgument::IS_ARRAY, 'numbers to be subtracted');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->subtract($input, $output);
    }
}

?>