<?php
/**
 * Created by PhpStorm.
 * User: jakjr
 * Date: 05/07/15
 * Time: 06:02
 */

namespace Jakjr\Keeper;


class Keeper {

    private $context = null;
    
    function __construct($client=null)
    {
        if (! is_null($client)) {
            $this->context = get_class($client);
        }
    }

    public function getContext($passedContext=null)
    {
        if (! is_null($passedContext)) {
            return $passedContext;
        }

        if (! is_null($this->context)) {
            return $this->context;
        }

        throw new \InvalidArgumentException('No context defined');
    }

    public function keep($inputs, $context=null)
    {
        $contextToUse = $this->getContext($context);

        foreach($inputs as $key => $value) {
            \Session::put("keeper.$contextToUse.$key", $value);
        }
    }

    public function get($key, $context=null)
    {
        $contextToUse = $this->getContext($context);

        return \Session::get("keeper.$contextToUse.$key");
    }

    public function all($context=null)
    {
        $contextToUse = $this->getContext($context);

        return \Session::get("keeper.$contextToUse");
    }

}