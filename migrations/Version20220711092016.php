<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220711092016 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, cat_name VARCHAR(255) NOT NULL, cat_des VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, cust_name VARCHAR(255) NOT NULL, address VARCHAR(500) NOT NULL, telephone VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, cus_id INT DEFAULT NULL, order_date DATE NOT NULL, delivery_date DATE NOT NULL, INDEX IDX_E52FFDEEEE1AA0B8 (cus_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, cat_id INT DEFAULT NULL, pro_name VARCHAR(255) NOT NULL, price INT NOT NULL, old_price INT NOT NULL, pro_desc VARCHAR(500) NOT NULL, pro_qty INT NOT NULL, pro_image VARCHAR(255) NOT NULL, INDEX IDX_D34A04ADE6ADA943 (cat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEEEE1AA0B8 FOREIGN KEY (cus_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADE6ADA943 FOREIGN KEY (cat_id) REFERENCES category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADE6ADA943');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEEEE1AA0B8');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE user');
    }
}
