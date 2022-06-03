<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220531193734 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE book_book_category (book_id INT NOT NULL, book_category_id INT NOT NULL, PRIMARY KEY(book_id, book_category_id))');
        $this->addSql('CREATE INDEX IDX_7A5A379416A2B381 ON book_book_category (book_id)');
        $this->addSql('CREATE INDEX IDX_7A5A379440B1D29E ON book_book_category (book_category_id)');
        $this->addSql('ALTER TABLE book_book_category ADD CONSTRAINT FK_7A5A379416A2B381 FOREIGN KEY (book_id) REFERENCES book (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE book_book_category ADD CONSTRAINT FK_7A5A379440B1D29E FOREIGN KEY (book_category_id) REFERENCES book_category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE book_book_category DROP CONSTRAINT FK_7A5A379416A2B381');
        $this->addSql('ALTER TABLE book_book_category DROP CONSTRAINT FK_7A5A379440B1D29E');
        $this->addSql('DROP TABLE book_book_category');
    }
}
