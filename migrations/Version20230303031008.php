<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230303031008 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE book (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, author VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL, republish INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE member (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, phone_num VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, birth_date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rent (id INT AUTO_INCREMENT NOT NULL, mem_id INT NOT NULL, book_id INT NOT NULL, rent_date DATE NOT NULL, return_date DATE NOT NULL, rent_price INT NOT NULL, INDEX IDX_2784DCC43676E6 (mem_id), INDEX IDX_2784DCC16A2B381 (book_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rent ADD CONSTRAINT FK_2784DCC43676E6 FOREIGN KEY (mem_id) REFERENCES member (id)');
        $this->addSql('ALTER TABLE rent ADD CONSTRAINT FK_2784DCC16A2B381 FOREIGN KEY (book_id) REFERENCES book (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rent DROP FOREIGN KEY FK_2784DCC43676E6');
        $this->addSql('ALTER TABLE rent DROP FOREIGN KEY FK_2784DCC16A2B381');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE member');
        $this->addSql('DROP TABLE rent');
    }
}
