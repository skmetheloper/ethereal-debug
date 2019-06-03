<?php
namespace Ethereal\Application;

use Ethereal\Contracts\DirectoriesContract;
use Psr\Log\InvalidArgumentException;

class ProjectPaths implements DirectoriesContract
{
    protected $app;

    protected $appPath;

    protected $configsPath;

    protected $databasePath;

    protected $publicPath;

    protected $routesPath;

    protected $storagePath;

    protected $excluded = ['app'];

    public function bind($name, $value)
    {
        if (!property_exists($this, $name)) {
            throw new InvalidArgumentException('property name: [' . $name . '] does not existed');
        }

        $this->{$name} = $value;

        $this->bindAllPaths();
    }

    protected function realpath(...$path)
    {
        $path = implode(DIRECTORY_SEPARATOR, $path);
        return realpath($path) ?: false;
    }

    protected function bindAllPaths()
    {
        $this->setAppPath('app');
        $this->setBuildPath('build');
        $this->setConfigsPath('configs');
        $this->setDatabasePath('database');
        $this->setPublicPath('public');
        $this->setRoutesPath('routes');
        $this->setStoragePath('storage');
    }

    protected function setAppPath($path)
    {
        $this->appPath = static::realpath($this->app->getBasePath(), $path);
    }

    protected function setBuildPath($path)
    {
        $this->buildPath = static::realpath($this->app->getBasePath(), $path);
    }

    protected function setConfigsPath($path)
    {
        $this->configsPath = static::realpath($this->app->getBasePath(), $path);
    }

    protected function setDatabasePath($path)
    {
        $this->databasePath = static::realpath($this->app->getBasePath(), $path);
    }

    protected function setPublicPath($path)
    {
        $this->publicPath = static::realpath($this->app->getBasePath(), $path);
    }

    protected function setRoutesPath($path)
    {
        $this->routesPath = static::realpath($this->app->getBasePath(), $path);
    }

    protected function setStoragePath($path)
    {
        $this->storagePath = static::realpath($this->app->getBasePath(), $path);
    }

    public function getAppPath()
    {
        return $this->appPath;
    }

    public function getBuildPath()
    {
        return $this->buildPath;
    }

    public function getConfigsPath()
    {
        return $this->configsPath;
    }

    public function getDatabasePath()
    {
        return $this->databasePath;
    }

    public function getPublicPath()
    {
        return $this->publicPath;
    }

    public function getRoutesPath()
    {
        return $this->routesPath;
    }

    public function getStoragePath()
    {
        return $this->storagePath;
    }
}