<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210820184207 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE booking (id INT AUTO_INCREMENT NOT NULL, duration DATETIME NOT NULL, price DOUBLE PRECISION NOT NULL, validation TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE booking_deal (booking_id INT NOT NULL, deal_id INT NOT NULL, INDEX IDX_FB6FE3583301C60 (booking_id), INDEX IDX_FB6FE358F60E2305 (deal_id), PRIMARY KEY(booking_id, deal_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE booking_user (booking_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_9502F4073301C60 (booking_id), INDEX IDX_9502F407A76ED395 (user_id), PRIMARY KEY(booking_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, category_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE consumer (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, credit_card VARCHAR(255) DEFAULT NULL, point_fidelite INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE deal (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, deal_name VARCHAR(255) NOT NULL, deal_desc VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, quantity INT NOT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_E3FEC11612469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE panier (id INT AUTO_INCREMENT NOT NULL, quantity INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE panier_deal (panier_id INT NOT NULL, deal_id INT NOT NULL, INDEX IDX_1718E46FF77D927C (panier_id), INDEX IDX_1718E46FF60E2305 (deal_id), PRIMARY KEY(panier_id, deal_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE panier_consumer (panier_id INT NOT NULL, consumer_id INT NOT NULL, INDEX IDX_EA1E3E55F77D927C (panier_id), INDEX IDX_EA1E3E5537FDBD6D (consumer_id), PRIMARY KEY(panier_id, consumer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promo (id INT AUTO_INCREMENT NOT NULL, id_category_id INT DEFAULT NULL, code_promo VARCHAR(255) DEFAULT NULL, remise_porcentaje INT DEFAULT NULL, INDEX IDX_B0139AFBA545015 (id_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, fisrt_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, matricule VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE booking_deal ADD CONSTRAINT FK_FB6FE3583301C60 FOREIGN KEY (booking_id) REFERENCES booking (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE booking_deal ADD CONSTRAINT FK_FB6FE358F60E2305 FOREIGN KEY (deal_id) REFERENCES deal (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE booking_user ADD CONSTRAINT FK_9502F4073301C60 FOREIGN KEY (booking_id) REFERENCES booking (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE booking_user ADD CONSTRAINT FK_9502F407A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE deal ADD CONSTRAINT FK_E3FEC11612469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE panier_deal ADD CONSTRAINT FK_1718E46FF77D927C FOREIGN KEY (panier_id) REFERENCES panier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE panier_deal ADD CONSTRAINT FK_1718E46FF60E2305 FOREIGN KEY (deal_id) REFERENCES deal (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE panier_consumer ADD CONSTRAINT FK_EA1E3E55F77D927C FOREIGN KEY (panier_id) REFERENCES panier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE panier_consumer ADD CONSTRAINT FK_EA1E3E5537FDBD6D FOREIGN KEY (consumer_id) REFERENCES consumer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE promo ADD CONSTRAINT FK_B0139AFBA545015 FOREIGN KEY (id_category_id) REFERENCES category (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking_deal DROP FOREIGN KEY FK_FB6FE3583301C60');
        $this->addSql('ALTER TABLE booking_user DROP FOREIGN KEY FK_9502F4073301C60');
        $this->addSql('ALTER TABLE deal DROP FOREIGN KEY FK_E3FEC11612469DE2');
        $this->addSql('ALTER TABLE promo DROP FOREIGN KEY FK_B0139AFBA545015');
        $this->addSql('ALTER TABLE panier_consumer DROP FOREIGN KEY FK_EA1E3E5537FDBD6D');
        $this->addSql('ALTER TABLE booking_deal DROP FOREIGN KEY FK_FB6FE358F60E2305');
        $this->addSql('ALTER TABLE panier_deal DROP FOREIGN KEY FK_1718E46FF60E2305');
        $this->addSql('ALTER TABLE panier_deal DROP FOREIGN KEY FK_1718E46FF77D927C');
        $this->addSql('ALTER TABLE panier_consumer DROP FOREIGN KEY FK_EA1E3E55F77D927C');
        $this->addSql('ALTER TABLE booking_user DROP FOREIGN KEY FK_9502F407A76ED395');
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE booking_deal');
        $this->addSql('DROP TABLE booking_user');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE consumer');
        $this->addSql('DROP TABLE deal');
        $this->addSql('DROP TABLE panier');
        $this->addSql('DROP TABLE panier_deal');
        $this->addSql('DROP TABLE panier_consumer');
        $this->addSql('DROP TABLE promo');
        $this->addSql('DROP TABLE user');
    }
}
