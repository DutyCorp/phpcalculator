<?php 

namespace Console;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Command extends SymfonyCommand
{
    public function __construct(){
    	parent::__construct();
    }

    protected function add(InputInterface $input, OutputInterface $output)
    {
        $arr = $input->getArgument('numbers');
        $result = 0;

        for ($i = 0; $i < sizeof($arr); $i++){
        	$result += $arr[$i];
        }
        $output->writeln($result);
    }

    protected function subtract(InputInterface $input, OutputInterface $output)
    {
        $arr = $input->getArgument('numbers');
        $result = 0;

        $result = $arr[0];

        for ($i = 1; $i < sizeof($arr); $i++){
        	$result -= $arr[$i];
        }
        $output->writeln($result);
    }
}

?>