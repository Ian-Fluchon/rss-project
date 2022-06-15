<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220615065335 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE site_web (id INT AUTO_INCREMENT NOT NULL, id_feed_rss_id INT NOT NULL, google_url VARCHAR(255) NOT NULL, nom_site_web VARCHAR(50) NOT NULL, language VARCHAR(40) NOT NULL, country VARCHAR(40) NOT NULL, site_web_url VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_E154097173E03925 (id_feed_rss_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE site_web ADD CONSTRAINT FK_E154097173E03925 FOREIGN KEY (id_feed_rss_id) REFERENCES feed_rss (id)');
        $this->addSql('DROP TABLE google_url');
        $this->addSql('DROP TABLE web_sites');
        $this->addSql('ALTER TABLE feed_rss CHANGE language language VARCHAR(40) NOT NULL, CHANGE country country VARCHAR(40) NOT NULL, CHANGE url google_url VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE google_url (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE web_sites (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, url VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, language VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, country VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE site_web');
        $this->addSql('ALTER TABLE feed_rss CHANGE language language VARCHAR(255) NOT NULL, CHANGE country country VARCHAR(255) NOT NULL, CHANGE google_url url VARCHAR(255) NOT NULL');
    }
}
