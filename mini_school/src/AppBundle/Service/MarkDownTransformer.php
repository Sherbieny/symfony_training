<?php
/**
 * Created by PhpStorm.
 * User: sherbieny
 * Date: 6/24/17
 * Time: 5:37 PM
 */

namespace AppBundle\Service;


class MarkDownTransformer
{

    public function parse($string){
        return strtoupper($string);
    }

}