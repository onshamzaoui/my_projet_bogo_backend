<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210802134845 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, user_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, category_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, user_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, matricule VARCHAR(255) NOT NULL, num_tel VARCHAR(8) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE consumer (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE deal (id INT AUTO_INCREMENT NOT NULL, category_name_id INT NOT NULL, deal_name VARCHAR(255) NOT NULL, deal_image VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, date_debut DATETIME NOT NULL, date_fin DATETIME NOT NULL, quantite INT NOT NULL, UNIQUE INDEX UNIQ_E3FEC116B6CFDCA8 (category_name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE validation (id_admin_id INT NOT NULL, id_deal_id INT NOT NULL, code_promo VARCHAR(255) DEFAULT NULL, INDEX IDX_16AC5B6E34F06E85 (id_admin_id), INDEX IDX_16AC5B6E28938A75 (id_deal_id), PRIMARY KEY(id_admin_id, id_deal_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE deal ADD CONSTRAINT FK_E3FEC116B6CFDCA8 FOREIGN KEY (category_name_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE validation ADD CONSTRAINT FK_16AC5B6E34F06E85 FOREIGN KEY (id_admin_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE validation ADD CONSTRAINT FK_16AC5B6E28938A75 FOREIGN KEY (id_deal_id) REFERENCES deal (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE validation DROP FOREIGN KEY FK_16AC5B6E34F06E85');
        $this->addSql('ALTER TABLE deal DROP FOREIGN KEY FK_E3FEC116B6CFDCA8');
        $this->addSql('ALTER TABLE validation DROP FOREIGN KEY FK_16AC5B6E28938A75');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE consumer');
        $this->addSql('DROP TABLE deal');
        $this->addSql('DROP TABLE validation');
    }
}
