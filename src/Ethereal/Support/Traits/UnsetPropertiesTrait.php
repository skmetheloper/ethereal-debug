<?php
namespace Ethereal\Support\Traits;

trait UnsetPropertiesTrait
{
    protected function unsetProperties($excluded = 'excluded')
    {
        if (!property_exists($this, $excluded)) {
            if (!method_exists($this, $excluded)) return;
            $this->{$excluded} = $this->{$excluded}();
        }
        $excludes = (array)$this->{$excluded};
        foreach ($excludes as $exclude) {
            $this->unsetProperty($exclude);
        }
        unset($this->{$excluded});
    }

    protected function unsetProperty($exclude)
    {
        unset($this->{$exclude});
    }
}