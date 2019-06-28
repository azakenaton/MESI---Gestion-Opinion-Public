<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190627192542 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Post ADD id_utilisateur INT NOT NULL, ADD lien_externe VARCHAR(255) NOT NULL, DROP idUtilisateur, DROP lienExterne, CHANGE idPost idPost INT AUTO_INCREMENT NOT NULL, CHANGE contenu contenu VARCHAR(255) NOT NULL, CHANGE datecreation date_creation DATETIME NOT NULL, ADD PRIMARY KEY (idPost)');
        $this->addSql('DROP INDEX idAvatar ON Utilisateur');
        $this->addSql('DROP INDEX idPieceIdentite ON Utilisateur');
        $this->addSql('ALTER TABLE Utilisateur ADD email VARCHAR(255) NOT NULL, CHANGE idUtilisateur idUtilisateur INT AUTO_INCREMENT NOT NULL, CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE prenom prenom VARCHAR(255) NOT NULL, CHANGE password password VARCHAR(255) NOT NULL, CHANGE idPieceIdentite idPieceIdentite VARCHAR(255) NOT NULL, CHANGE idAvatar idAvatar INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Post MODIFY idPost INT NOT NULL');
        $this->addSql('ALTER TABLE Post DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE Post ADD idUtilisateur INT UNSIGNED NOT NULL, ADD lienExterne VARCHAR(250) NOT NULL COLLATE utf8_general_ci, DROP id_utilisateur, DROP lien_externe, CHANGE idPost idPost INT UNSIGNED NOT NULL, CHANGE contenu contenu VARCHAR(250) NOT NULL COLLATE utf8_general_ci, CHANGE date_creation dateCreation DATETIME NOT NULL');
        $this->addSql('ALTER TABLE Utilisateur DROP email, CHANGE idUtilisateur idUtilisateur INT UNSIGNED AUTO_INCREMENT NOT NULL, CHANGE nom nom VARCHAR(50) NOT NULL COLLATE utf8_general_ci, CHANGE prenom prenom VARCHAR(50) NOT NULL COLLATE utf8_general_ci, CHANGE password password VARCHAR(75) NOT NULL COLLATE utf8_general_ci, CHANGE idPieceIdentite idPieceIdentite INT UNSIGNED NOT NULL, CHANGE idAvatar idAvatar INT UNSIGNED NOT NULL');
        $this->addSql('CREATE INDEX idAvatar ON Utilisateur (idAvatar)');
        $this->addSql('CREATE INDEX idPieceIdentite ON Utilisateur (idPieceIdentite)');
    }
}
