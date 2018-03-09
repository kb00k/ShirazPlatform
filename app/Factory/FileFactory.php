<?php
/**
 * Created by PhpStorm.
 * User: Ali Ghasemzadeh
 * Date: 3/9/2018
 * Time: 4:13 PM
 */

namespace App\Factory;

use App\File;
use App\FilePurchase;

class FileFactory
{
    public function create($item, $user, $options = array())
    {
        $filePurchase = new ilePurchase();
        $filePurchase->user_id = $user->id;
        $filePurchase->file_id = $item->factory_id;
        $filePurchase->price = $item->price;
        return $filePurchase->save();
    }

    public function terminate($item, $user, $options = array())
    {

    }

    public function suspend($item, $user, $options = array())
    {

    }

}