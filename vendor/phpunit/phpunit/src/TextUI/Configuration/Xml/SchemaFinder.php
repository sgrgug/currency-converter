<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\TextUI\XmlConfiguration;

use function defined;
use function is_file;
use function sprintf;
use PHPUnit\Runner\Version;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final readonly class SchemaFinder
{
    /**
     * @throws CannotFindSchemaException
     */
    public function find(string $version): string
    {
        if ($version === Version::series()) {
            $filename = $this->path() . 'phpunit.xsd';
        } else {
            $filename = $this->path() . 'schema/' . $version . '.xsd';
        }

        if (!is_file($filename)) {
            throw new CannotFindSchemaException(
                sprintf(
                    'Schema for PHPUnit %s is not available',
                    $version,
                ),
            );
        }

        return $filename;
    }

    private function path(): string
    {
        if (defined('__PHPUNIT_PHAR_ROOT__')) {
            return __PHPUNIT_PHAR_ROOT__ . '/';
        }

        return __DIR__ . '/../../../../';
    }
}
