<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220615053900 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_link ADD article_url_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article_link ADD CONSTRAINT FK_86EE1EF0EB084D67 FOREIGN KEY (article_url_id) REFERENCES articles (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_86EE1EF0EB084D67 ON article_link (article_url_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_link DROP FOREIGN KEY FK_86EE1EF0EB084D67');
        $this->addSql('DROP INDEX UNIQ_86EE1EF0EB084D67 ON article_link');
        $this->addSql('ALTER TABLE article_link DROP article_url_id');
    }
}
