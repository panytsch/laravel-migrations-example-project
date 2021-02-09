<?php
declare(strict_types=1);

use ElasticAdapter\Indices\Mapping;
use ElasticAdapter\Indices\Settings;
use ElasticMigrations\Facades\Index;
use ElasticMigrations\MigrationInterface;

final class CreateMigrationsIndex implements MigrationInterface
{
    /**
     * Run the migration.
     */
    public function up(): void
    {
        Index::createIfNotExists(
            'test_index',
            function (Mapping $mapping, Settings $settings) {
                $mapping->keyword('migration');
                $mapping->integer('batch');
            }
        );
    }

    /**
     * Reverse the migration.
     */
    public function down(): void
    {
        Index::dropIfExists('test_index');
    }
}
