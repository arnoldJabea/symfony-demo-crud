<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250429144732 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE posts (id_post INT AUTO_INCREMENT NOT NULL, id_utilisateur INT NOT NULL, titre VARCHAR(255) NOT NULL, contenu LONGTEXT NOT NULL, date_creation DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, date_modification DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX IDX_885DBAFA50EAE44 (id_utilisateur), PRIMARY KEY(id_post)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE utilisateurs (id_utilisateur INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, email VARCHAR(100) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, date_creation DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, role VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_497B315EE7927C74 (email), PRIMARY KEY(id_utilisateur)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE posts ADD CONSTRAINT FK_885DBAFA50EAE44 FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs (id_utilisateur)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE posts DROP FOREIGN KEY FK_885DBAFA50EAE44
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE posts
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE utilisateurs
        SQL);
    }
}
