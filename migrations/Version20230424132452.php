<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230424132452 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE equipes_jeux_pkmn (equipes_id INT NOT NULL, jeux_pkmn_id INT NOT NULL, INDEX IDX_EAE0A265737800BA (equipes_id), INDEX IDX_EAE0A265E22EB65B (jeux_pkmn_id), PRIMARY KEY(equipes_id, jeux_pkmn_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equipes_jeux_pkmn ADD CONSTRAINT FK_EAE0A265737800BA FOREIGN KEY (equipes_id) REFERENCES equipes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipes_jeux_pkmn ADD CONSTRAINT FK_EAE0A265E22EB65B FOREIGN KEY (jeux_pkmn_id) REFERENCES jeux_pkmn (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE equipes_jeux_pkmn');
    }
}
