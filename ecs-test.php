<?php

/**
 * This configuration file is used to test the ECS configuration and GitHub Actions workflow on this repository.
 * It is not designed to be used outside of this repository.
 */

declare(strict_types=1);

use Symplify\EasyCodingStandard\Config\ECSConfig;

return static function (ECSConfig $ecsConfig): void {
    $ecsConfig->import(__DIR__ . '/ecs.php');

    $ecsConfig->paths(
        [
            __DIR__ . '/ecs.php',
            __FILE__,
        ],
    );
};
