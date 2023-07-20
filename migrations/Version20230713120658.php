<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230713120658 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipes ADD pokemon1_sprite VARCHAR(255) NOT NULL, ADD pokemon2_sprite VARCHAR(255) NOT NULL, ADD pokemon3_sprite VARCHAR(255) NOT NULL, ADD pokemon4_sprite VARCHAR(255) NOT NULL, ADD pokemon5_sprite VARCHAR(255) NOT NULL, ADD pokemon6_sprite VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipes DROP pokemon1_sprite, DROP pokemon2_sprite, DROP pokemon3_sprite, DROP pokemon4_sprite, DROP pokemon5_sprite, DROP pokemon6_sprite');
    }
}
