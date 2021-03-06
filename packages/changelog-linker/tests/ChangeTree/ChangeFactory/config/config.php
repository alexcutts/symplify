<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\ChangelogLinker\ValueObject\Option;

return static function (ContainerConfigurator $containerConfigurator): void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set(Option::AUTHORS_TO_IGNORE, ['ego']);
    $parameters->set(Option::PACKAGE_ALIASES, [
        'A' => 'Aliased',
        'aliased-packag' => 'Aliased',
    ]);
};
