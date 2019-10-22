<?php 

namespace Console;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;

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
        	if ($i == 0){
        		$strinput = ''.$arr[$i].'';
        	} else {
        		$strinput .= ' + '.$arr[$i].'';
        	}
        }
        $stroutput = $strinput;
        $stroutput .= ' = '.$result.'';

        $filesystem = new Filesystem();
        $file = 'historylog';
        if (file_exists($file)){
        	$str = ''.PHP_EOL.'Add,'.$strinput.','.$result.','.$stroutput.','.date('Y-m-d H:i:s').'';
        } else {
        	$str = 'Add,'.$strinput.','.$result.','.$stroutput.','.date('Y-m-d H:i:s').'';
        }
        $filesystem->appendToFile($file, $str);

        $output->writeln($result);
    }

    protected function subtract(InputInterface $input, OutputInterface $output)
    {
        $arr = $input->getArgument('numbers');

        $result = $arr[0];
        $strinput = ''.$arr[0].'';

        for ($i = 1; $i < sizeof($arr); $i++){
        	$result -= $arr[$i];
        	$strinput .= ' - '.$arr[$i].'';
        }
        $stroutput = $strinput;
        $stroutput .= ' = '.$result.'';

        $filesystem = new Filesystem();
        $file = 'historylog';
        if (file_exists($file)){
        	$str = ''.PHP_EOL.'Subtract,'.$strinput.','.$result.','.$stroutput.','.date('Y-m-d H:i:s').'';
        } else {
        	$str = 'Subtract,'.$strinput.','.$result.','.$stroutput.','.date('Y-m-d H:i:s').'';
        }
        $filesystem->appendToFile($file, $str);

        $output->writeln($result);
    }

    protected function multiply(InputInterface $input, OutputInterface $output)
    {
        $arr = $input->getArgument('numbers');

        $result = $arr[0];
        $strinput = ''.$arr[0].'';

        for ($i = 1; $i < sizeof($arr); $i++){
        	$result *= $arr[$i];
        	$strinput .= ' * '.$arr[$i].'';
        }
        $stroutput = $strinput;
        $stroutput .= ' = '.$result.'';

        $filesystem = new Filesystem();
        $file = 'historylog';
        if (file_exists($file)){
        	$str = ''.PHP_EOL.'Multiply,'.$strinput.','.$result.','.$stroutput.','.date('Y-m-d H:i:s').'';
        } else {
        	$str = 'Multiply,'.$strinput.','.$result.','.$stroutput.','.date('Y-m-d H:i:s').'';
        }
        $filesystem->appendToFile($file, $str);

        $output->writeln($result);
    }

    protected function divide(InputInterface $input, OutputInterface $output)
    {
        $arr = $input->getArgument('numbers');

        $result = $arr[0];
        $strinput = ''.$arr[0].'';

        for ($i = 1; $i < sizeof($arr); $i++){
        	$result /= $arr[$i];
        	$strinput .= ' / '.$arr[$i].'';
        }
        $stroutput = $strinput;
        $stroutput .= ' = '.$result.'';

        $filesystem = new Filesystem();
        $file = 'historylog';
        if (file_exists($file)){
        	$str = ''.PHP_EOL.'Divide,'.$strinput.','.$result.','.$stroutput.','.date('Y-m-d H:i:s').'';
        } else {
        	$str = 'Divide,'.$strinput.','.$result.','.$stroutput.','.date('Y-m-d H:i:s').'';
        }
        $filesystem->appendToFile($file, $str);

        $output->writeln($result);
    }

    protected function pow(InputInterface $input, OutputInterface $output)
    {
        $result = pow($input->getArgument('base'), $input->getArgument('exp'));
        $strinput = ''.$input->getArgument('base').' ^ '.$input->getArgument('exp').'';
        $stroutput = $strinput;
        $stroutput .= ' = '.$result.'';

        $filesystem = new Filesystem();
        $file = 'historylog';
        if (file_exists($file)){
        	$str = ''.PHP_EOL.'Pow,'.$strinput.','.$result.','.$stroutput.','.date('Y-m-d H:i:s').'';
        } else {
        	$str = 'Pow,'.$strinput.','.$result.','.$stroutput.','.date('Y-m-d H:i:s').'';
        }
        $filesystem->appendToFile($file, $str);

        $output->writeln($result);
    }

    protected function listHistory(InputInterface $input, OutputInterface $output)
    {
        $file = 'historylog';
        if (file_exists($file)){

        	$arr = explode("\n", file_get_contents($file));
	        $filterarr = $input->getArgument('commands');

	        $strresult = "+----+------------+---------------------------+------------+-------------------------------------+---------------------+\n";
	        $strresult .= "| No | Command    | Description               | Result     | Output                              | Time                |\n";
	        $strresult .= "+----+------------+---------------------------+------------+-------------------------------------+---------------------+\n";
	        $k = 1;
	        for ($i = 0; $i < sizeof($arr); $i++){
	        	if (sizeof($filterarr) != 0){
	        		for ($j = 0; $j < sizeof($filterarr); $j++){
		        		if (stripos($arr[$i], $filterarr[$j]) !== false){
		        			$rowarr = explode(",", $arr[$i]);
		        			$strresult .= "| ".str_pad($k, 2)." | ".str_pad($rowarr[0], 10)." | ".str_pad($rowarr[1], 25)." | ".str_pad($rowarr[2], 10)." | ".str_pad($rowarr[3], 35)." | ".str_pad($rowarr[4], 19)." | \n";
		        			$k++;
		        		}
		        	}
	        	}
	        	else {
	        		$rowarr = explode(",", $arr[$i]);
		        	$strresult .= "| ".str_pad($k, 2)." | ".str_pad($rowarr[0], 10)." | ".str_pad($rowarr[1], 25)." | ".str_pad($rowarr[2], 10)." | ".str_pad($rowarr[3], 35)." | ".str_pad($rowarr[4], 19)." | \n";
		        	$k++;
	        	}
	        }
	        $strresult .= "+----+------------+---------------------------+------------+-------------------------------------+---------------------+";

	    	$output->writeln($strresult);
        } else {
        	$output->writeln('History is empty');
        }
    }

    protected function clearHistory(OutputInterface $output)
    {
        unlink('historylog');

        $output->writeln('History cleared!');
    }
}

?>