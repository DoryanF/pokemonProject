<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230424152937 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE equipes_pokemons (equipes_id INT NOT NULL, pokemons_id INT NOT NULL, INDEX IDX_180873F8737800BA (equipes_id), INDEX IDX_180873F8263F4792 (pokemons_id), PRIMARY KEY(equipes_id, pokemons_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equipes_pokemons ADD CONSTRAINT FK_180873F8737800BA FOREIGN KEY (equipes_id) REFERENCES equipes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipes_pokemons ADD CONSTRAINT FK_180873F8263F4792 FOREIGN KEY (pokemons_id) REFERENCES pokemons (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE equipes_pokemons');
    }
}
