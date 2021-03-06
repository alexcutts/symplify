<?php

declare(strict_types=1);

use PhpParser\BuilderFactory;
use PhpParser\NodeFinder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\Yaml\Parser;
use Symplify\PackageBuilder\Parameter\ParameterProvider;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();

    $services->defaults()
        ->public()
        ->autowire()
        ->autoconfigure();

    $services->load('Symplify\PhpConfigPrinter\\', __DIR__ . '/../src')
        ->exclude([__DIR__ . '/../src/HttpKernel', __DIR__ . '/../src/Dummy', __DIR__ . '/../src/Bundle']);

    $services->set(NodeFinder::class);
    $services->set(Parser::class);
    $services->set(BuilderFactory::class);

    $services->set(ParameterProvider::class);
};
