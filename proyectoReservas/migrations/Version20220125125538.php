<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220125125538 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student_subject (id INT AUTO_INCREMENT NOT NULL, name_student_id INT NOT NULL, name_subject_id INT NOT NULL, INDEX IDX_16F88B82533A9F98 (name_student_id), INDEX IDX_16F88B829A900C05 (name_subject_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subject (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE student_subject ADD CONSTRAINT FK_16F88B82533A9F98 FOREIGN KEY (name_student_id) REFERENCES student (id)');
        $this->addSql('ALTER TABLE student_subject ADD CONSTRAINT FK_16F88B829A900C05 FOREIGN KEY (name_subject_id) REFERENCES subject (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD12469DE2 ON product (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student_subject DROP FOREIGN KEY FK_16F88B82533A9F98');
        $this->addSql('ALTER TABLE student_subject DROP FOREIGN KEY FK_16F88B829A900C05');
        $this->addSql('DROP TABLE student');
        $this->addSql('DROP TABLE student_subject');
        $this->addSql('DROP TABLE subject');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD12469DE2');
        $this->addSql('DROP INDEX IDX_D34A04AD12469DE2 ON product');
    }
}
