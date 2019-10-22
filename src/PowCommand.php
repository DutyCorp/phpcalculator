<?php 

namespace Console;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Console\Command;

class PowCommand extends Command
{
    public function configure()
    {
        $this->setName('pow')
        	->setDescription('Exponent the given number')
        	->setHelp('This command allows you to exponent number given')
        	->addArgument('base', InputArgument::REQUIRED, 'the base number')
            ->addArgument('exp', InputArgument::REQUIRED, 'the exponent number');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->pow($input, $output);
    }
}

?>