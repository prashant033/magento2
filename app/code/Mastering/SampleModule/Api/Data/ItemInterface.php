<?php
/**
 * Created by PhpStorm.
 * User: pragauta1
 * Date: 8/9/2018
 * Time: 12:10 PM
 */
namespace Mastering\SampleModule\Api\Data;
interface ItemInterface
{
 /*
  * GetName @string*/
    public function getName();
    /*GetDescription will $string|null*/
    public function getDescription();

}