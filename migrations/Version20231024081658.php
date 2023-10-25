<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231024081658 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE index_pole (id INT AUTO_INCREMENT NOT NULL, id_pole_id INT DEFAULT NULL, index_nom VARCHAR(255) NOT NULL, url_index VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_56E09AB29F019AF5 (id_pole_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pole (id INT AUTO_INCREMENT NOT NULL, pole_nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rapport_activite (id INT AUTO_INCREMENT NOT NULL, url_index_id INT NOT NULL, mission_principale LONGTEXT DEFAULT NULL, indicateur LONGTEXT DEFAULT NULL, realisation LONGTEXT DEFAULT NULL, perspective LONGTEXT DEFAULT NULL, donnees_finance LONGTEXT DEFAULT NULL, donnees_rh LONGTEXT DEFAULT NULL, status VARCHAR(255) NOT NULL, indicateur_file LONGBLOB DEFAULT NULL, realisation_file LONGTEXT DEFAULT NULL, perspective_file LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_6CB5B597E6531CE8 (url_index_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE index_pole ADD CONSTRAINT FK_56E09AB29F019AF5 FOREIGN KEY (id_pole_id) REFERENCES pole (id)');
        $this->addSql('ALTER TABLE rapport_activite ADD CONSTRAINT FK_6CB5B597E6531CE8 FOREIGN KEY (url_index_id) REFERENCES index_pole (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE index_pole DROP FOREIGN KEY FK_56E09AB29F019AF5');
        $this->addSql('ALTER TABLE rapport_activite DROP FOREIGN KEY FK_6CB5B597E6531CE8');
        $this->addSql('DROP TABLE index_pole');
        $this->addSql('DROP TABLE pole');
        $this->addSql('DROP TABLE rapport_activite');
    }
}
