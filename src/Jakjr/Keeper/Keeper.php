<?php
/**
 * Created by PhpStorm.
 * User: jakjr
 * Date: 05/07/15
 * Time: 06:02
 */

namespace Jakjr\Keeper;


class Keeper {

    public function keep($context, $inputs)
    {
        foreach($inputs as $key => $value) {
            \Session::put("keeper.$context.$key", $value);
        }
    }

    public function get($context, $key)
    {
        return \Session::get("keeper.$context.$key");
    }

}