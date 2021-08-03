<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210803125008 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE facturation (id INT AUTO_INCREMENT NOT NULL, id_client_id INT NOT NULL, duree DATETIME NOT NULL, type_de_paiment VARCHAR(255) NOT NULL, total DOUBLE PRECISION NOT NULL, INDEX IDX_17EB513A99DED506 (id_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE facturation ADD CONSTRAINT FK_17EB513A99DED506 FOREIGN KEY (id_client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE deal ADD facturation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE deal ADD CONSTRAINT FK_E3FEC116DBC5F284 FOREIGN KEY (facturation_id) REFERENCES facturation (id)');
        $this->addSql('CREATE INDEX IDX_E3FEC116DBC5F284 ON deal (facturation_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE deal DROP FOREIGN KEY FK_E3FEC116DBC5F284');
        $this->addSql('DROP TABLE facturation');
        $this->addSql('DROP INDEX IDX_E3FEC116DBC5F284 ON deal');
        $this->addSql('ALTER TABLE deal DROP facturation_id');
    }
}
