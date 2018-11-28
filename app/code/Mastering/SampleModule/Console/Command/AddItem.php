<?php
/**
 * Created by PhpStorm.
 * User: pragauta1
 * Date: 8/7/2018
 * Time: 1:13 PM
 */

namespace Mastering\SampleModule\Console\Command;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Mastering\SampleModule\Model\ItemFactory;
use Magento\Framework\Console\Cli;

class AddItem extends Command
{
    const INPUT_KEY_NAME='name';
    const INPUT_KEY_DESCRIPTION='description';
    private $itemFactory;

    public function __construct(ItemFactory $itemFactory)
    {
       $this->itemFactory=$itemFactory;
       parent::__construct();
    }
    /*
    protected function configure()
    {
        $this->
    }*/

}

