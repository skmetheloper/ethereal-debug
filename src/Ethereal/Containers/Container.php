<?php
namespace Ethereal\Containers;

use Ethereal\Contracts\ContainerContract;

class Container implements ContainerContract
{
    public function get($name)
    {
        return $this->{$name} ?? null;
    }

    public function has($name)
    {
        if (!property_exists($this, $name)) {
            return null;
        }
        return isset($this->{$name});
    }
}