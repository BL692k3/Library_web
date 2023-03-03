<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230303025009 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book ADD book_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A33171868B2E FOREIGN KEY (book_id_id) REFERENCES rent (id)');
        $this->addSql('CREATE INDEX IDX_CBE5A33171868B2E ON book (book_id_id)');
        $this->addSql('ALTER TABLE member ADD mem_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE member ADD CONSTRAINT FK_70E4FA787DF122CF FOREIGN KEY (mem_id_id) REFERENCES rent (id)');
        $this->addSql('CREATE INDEX IDX_70E4FA787DF122CF ON member (mem_id_id)');
        $this->addSql('ALTER TABLE rent ADD rent_date DATE NOT NULL, ADD return_date DATE NOT NULL, ADD rent_price INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A33171868B2E');
        $this->addSql('DROP INDEX IDX_CBE5A33171868B2E ON book');
        $this->addSql('ALTER TABLE book DROP book_id_id');
        $this->addSql('ALTER TABLE member DROP FOREIGN KEY FK_70E4FA787DF122CF');
        $this->addSql('DROP INDEX IDX_70E4FA787DF122CF ON member');
        $this->addSql('ALTER TABLE member DROP mem_id_id');
        $this->addSql('ALTER TABLE rent DROP rent_date, DROP return_date, DROP rent_price');
    }
}
