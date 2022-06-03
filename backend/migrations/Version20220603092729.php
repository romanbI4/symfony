<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220603092729 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book ADD slug VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE book ADD image VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE book ADD authors TEXT NOT NULL');
        $this->addSql('ALTER TABLE book ADD date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE book ADD boolean BOOLEAN DEFAULT \'false\' NOT NULL');
        $this->addSql('COMMENT ON COLUMN book.authors IS \'(DC2Type:simple_array)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE book DROP slug');
        $this->addSql('ALTER TABLE book DROP image');
        $this->addSql('ALTER TABLE book DROP authors');
        $this->addSql('ALTER TABLE book DROP date');
        $this->addSql('ALTER TABLE book DROP boolean');
    }
}
