<?php
namespace Ethereal\Application;

use Ethereal\Containers\Container;

abstract class AppContainer extends Container
{
    protected $basePath;

    protected $projectPaths;

    protected static $instance;

    public static function getStaticInstance()
    {
        return static::$instance ?? false;
    }

    public function __construct($basePath = null)
    {
        if ($basePath) {
            $this->setBasePath($basePath);

            $this->setProjectPaths(new ProjectPaths);
        }

        $this->callableByStatic();
    }

    public function getBasePath()
    {
        return $this->basePath ?? null;
    }

    protected function setBasePath($basePath)
    {
        $this->basePath = realpath($basePath) ?: false;
    }

    protected function setProjectPaths(ProjectPaths $projectPaths)
    {
        $this->projectPaths = $projectPaths;

        $this->projectPaths->bind('app', $this);
    }

    protected function callableByStatic()
    {
        return static::$instance ?? static::$instance = $this;
    }

    public function register()
    {
        //
    }
}