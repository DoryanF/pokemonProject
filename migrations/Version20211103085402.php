<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211103085402 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pokedex (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pokemons_pokedex (pokemons_id INT NOT NULL, pokedex_id INT NOT NULL, INDEX IDX_F4DFAFC3263F4792 (pokemons_id), INDEX IDX_F4DFAFC3372A5D14 (pokedex_id), PRIMARY KEY(pokemons_id, pokedex_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pokemons_pokedex ADD CONSTRAINT FK_F4DFAFC3263F4792 FOREIGN KEY (pokemons_id) REFERENCES pokemons (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pokemons_pokedex ADD CONSTRAINT FK_F4DFAFC3372A5D14 FOREIGN KEY (pokedex_id) REFERENCES pokedex (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jeux_pkmn ADD pokedex_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE jeux_pkmn ADD CONSTRAINT FK_1C94499372A5D14 FOREIGN KEY (pokedex_id) REFERENCES pokedex (id)');
        $this->addSql('CREATE INDEX IDX_1C94499372A5D14 ON jeux_pkmn (pokedex_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jeux_pkmn DROP FOREIGN KEY FK_1C94499372A5D14');
        $this->addSql('ALTER TABLE pokemons_pokedex DROP FOREIGN KEY FK_F4DFAFC3372A5D14');
        $this->addSql('DROP TABLE pokedex');
        $this->addSql('DROP TABLE pokemons_pokedex');
        $this->addSql('DROP INDEX IDX_1C94499372A5D14 ON jeux_pkmn');
        $this->addSql('ALTER TABLE jeux_pkmn DROP pokedex_id');
    }
}
