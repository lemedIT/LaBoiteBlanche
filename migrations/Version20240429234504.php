<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240429234504 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE photos_categorie (photos_id INT NOT NULL, categorie_id INT NOT NULL, PRIMARY KEY(photos_id, categorie_id))');
        $this->addSql('CREATE INDEX IDX_C4038431301EC62 ON photos_categorie (photos_id)');
        $this->addSql('CREATE INDEX IDX_C4038431BCF5E72D ON photos_categorie (categorie_id)');
        $this->addSql('ALTER TABLE photos_categorie ADD CONSTRAINT FK_C4038431301EC62 FOREIGN KEY (photos_id) REFERENCES photos (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE photos_categorie ADD CONSTRAINT FK_C4038431BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE photos ADD auteur_id INT NOT NULL');
        $this->addSql('ALTER TABLE photos ADD CONSTRAINT FK_876E0D960BB6FE6 FOREIGN KEY (auteur_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_876E0D960BB6FE6 ON photos (auteur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE photos_categorie DROP CONSTRAINT FK_C4038431301EC62');
        $this->addSql('ALTER TABLE photos_categorie DROP CONSTRAINT FK_C4038431BCF5E72D');
        $this->addSql('DROP TABLE photos_categorie');
        $this->addSql('ALTER TABLE photos DROP CONSTRAINT FK_876E0D960BB6FE6');
        $this->addSql('DROP INDEX IDX_876E0D960BB6FE6');
        $this->addSql('ALTER TABLE photos DROP auteur_id');
    }
}
