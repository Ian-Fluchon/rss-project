<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220615053207 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article_link (id INT AUTO_INCREMENT NOT NULL, language VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE articles (id INT AUTO_INCREMENT NOT NULL, article_title VARCHAR(255) NOT NULL, article_language VARCHAR(255) NOT NULL, article_country VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL, keywords LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', author VARCHAR(255) DEFAULT NULL, content LONGTEXT NOT NULL, primary_site_name VARCHAR(255) NOT NULL, primary_site_url VARCHAR(255) NOT NULL, creation_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE feed_rss (id INT AUTO_INCREMENT NOT NULL, url_id INT NOT NULL, language VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_97A6F30A81CFDAE7 (url_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE web_site (id INT AUTO_INCREMENT NOT NULL, web_site_url VARCHAR(255) NOT NULL, language VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE feed_rss ADD CONSTRAINT FK_97A6F30A81CFDAE7 FOREIGN KEY (url_id) REFERENCES web_site (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE feed_rss DROP FOREIGN KEY FK_97A6F30A81CFDAE7');
        $this->addSql('DROP TABLE article_link');
        $this->addSql('DROP TABLE articles');
        $this->addSql('DROP TABLE feed_rss');
        $this->addSql('DROP TABLE web_site');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
