<?php 

namespace Console;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Console\Command;

class MultiplyCommand extends Command
{
    public function configure()
    {
        $this->setName('multiply')
        	->setDescription('Multiply all given Numbers')
        	->setHelp('This command allows you to multiply some numbers')
        	->addArgument('numbers', InputArgument::IS_ARRAY, 'numbers to be multiplied');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->multiply($input, $output);
    }
}

?>