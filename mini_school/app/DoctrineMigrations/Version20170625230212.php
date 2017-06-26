<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170625230212 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE department (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE teacher ADD department_id INT NOT NULL, ADD courses VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE teacher ADD CONSTRAINT FK_B0F6A6D5AE80F5DF FOREIGN KEY (department_id) REFERENCES department (id)');
        $this->addSql('CREATE INDEX IDX_B0F6A6D5AE80F5DF ON teacher (department_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE teacher DROP FOREIGN KEY FK_B0F6A6D5AE80F5DF');
        $this->addSql('DROP TABLE department');
        $this->addSql('DROP INDEX IDX_B0F6A6D5AE80F5DF ON teacher');
        $this->addSql('ALTER TABLE teacher DROP department_id, DROP courses');
    }
}
