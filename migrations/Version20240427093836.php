<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240427093836 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE yeti ADD CONSTRAINT FK_6525CCFC88A575A FOREIGN KEY (hodnoceni_id) REFERENCES hodnoceni (id)');
        $this->addSql('CREATE INDEX IDX_6525CCFC88A575A ON yeti (hodnoceni_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_bin`');
        $this->addSql('ALTER TABLE yeti DROP FOREIGN KEY FK_6525CCFC88A575A');
        $this->addSql('DROP INDEX IDX_6525CCFC88A575A ON yeti');
    }
}
