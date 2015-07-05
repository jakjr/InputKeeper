<?php
/**
 * Created by PhpStorm.
 * User: jakjr
 * Date: 05/07/15
 * Time: 06:02
 */

namespace Jakjr\Keeper;


class Keeper {

    //abstrair o contexto

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

    public function all($context)
    {
        return \Session::get("keeper.$context");
    }

}