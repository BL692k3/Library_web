<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230304084010 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rent ADD mem_id INT NOT NULL, ADD mem_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE rent ADD CONSTRAINT FK_2784DCC43676E6 FOREIGN KEY (mem_id) REFERENCES member (id)');
        $this->addSql('ALTER TABLE rent ADD CONSTRAINT FK_2784DCC7DF122CF FOREIGN KEY (mem_id_id) REFERENCES member (id)');
        $this->addSql('CREATE INDEX IDX_2784DCC43676E6 ON rent (mem_id)');
        $this->addSql('CREATE INDEX IDX_2784DCC7DF122CF ON rent (mem_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE rent DROP FOREIGN KEY FK_2784DCC43676E6');
        $this->addSql('ALTER TABLE rent DROP FOREIGN KEY FK_2784DCC7DF122CF');
        $this->addSql('DROP INDEX IDX_2784DCC43676E6 ON rent');
        $this->addSql('DROP INDEX IDX_2784DCC7DF122CF ON rent');
        $this->addSql('ALTER TABLE rent DROP mem_id, DROP mem_id_id');
    }
}
