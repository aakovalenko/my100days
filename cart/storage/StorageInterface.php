<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 09.03.18
 * Time: 10:30
 */
namespace app\cart\storage;

interface StorageInterface
{
    public function load();

    public function save($item);
}