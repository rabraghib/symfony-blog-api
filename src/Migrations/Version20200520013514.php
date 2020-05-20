<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200520013514 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE blogs (id INT AUTO_INCREMENT NOT NULL, poster_id INT NOT NULL, main_img VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, intro VARCHAR(700) NOT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL, lastupdate_at DATETIME NOT NULL, num_views INT NOT NULL, deleted TINYINT(1) NOT NULL, is_publushed TINYINT(1) NOT NULL, INDEX IDX_F41BCA705BB66C05 (poster_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE blogs ADD CONSTRAINT FK_F41BCA705BB66C05 FOREIGN KEY (poster_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE blogs');
    }
}