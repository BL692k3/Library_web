<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230310095721 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name_id INT DEFAULT NULL, INDEX IDX_64C19C171179CD6 (name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C171179CD6 FOREIGN KEY (name_id) REFERENCES book (id)');
        $this->addSql('ALTER TABLE book CHANGE category category VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE member CHANGE username username VARCHAR(180) NOT NULL, CHANGE phone_num phone_num VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_70E4FA78F85E0677 ON member (username)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C171179CD6');
        $this->addSql('DROP TABLE category');
        $this->addSql('ALTER TABLE book CHANGE category category VARCHAR(255) DEFAULT NULL');
        $this->addSql('DROP INDEX UNIQ_70E4FA78F85E0677 ON member');
        $this->addSql('ALTER TABLE member CHANGE username username VARCHAR(255) NOT NULL, CHANGE phone_num phone_num VARCHAR(255) DEFAULT NULL');
    }
}
