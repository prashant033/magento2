<?php
/**
 * Created by PhpStorm.
 * User: pragauta1
 * Date: 8/7/2018
 * Time: 11:27 PM
 */

namespace Mastering\SampleModule\Cron;
use Mastering\SampleModule\Model\ItemFactory;
use Mastering\SampleModule\Model\Config;

class AddItem
{
    private $itemFactory;
    private $config;
    public function __construct(ItemFactory $itemFactory,Config $config)
    {
        $this->itemFactory=$itemFactory;
        $this->$config=$config;
    }

    public function execute()
    {
        if($this->config->isEnabled())
        {
            $this->itemFactory->create()
                ->setName('Custom cron jobs item add')
                ->setDescription('Created custom cron jobs items' .time())
                ->save();
        }

    }
}
