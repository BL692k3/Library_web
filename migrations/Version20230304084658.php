<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230304084658 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rent ADD mem_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE rent ADD CONSTRAINT FK_2784DCC7DF122CF FOREIGN KEY (mem_id_id) REFERENCES member (id)');
        $this->addSql('CREATE INDEX IDX_2784DCC7DF122CF ON rent (mem_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rent DROP FOREIGN KEY FK_2784DCC7DF122CF');
        $this->addSql('DROP INDEX IDX_2784DCC7DF122CF ON rent');
        $this->addSql('ALTER TABLE rent DROP mem_id_id');
    }
}
