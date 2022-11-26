<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221125124121 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE attestion (id INT AUTO_INCREMENT NOT NULL, etudiant_id INT NOT NULL, convention_id INT NOT NULL, message LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_905312BEDDEAB1A3 (etudiant_id), UNIQUE INDEX UNIQ_905312BEA2ACEBCC (convention_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE convention (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, nbheur INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, mail VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE attestion ADD CONSTRAINT FK_905312BEDDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE attestion ADD CONSTRAINT FK_905312BEA2ACEBCC FOREIGN KEY (convention_id) REFERENCES convention (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE attestion DROP FOREIGN KEY FK_905312BEDDEAB1A3');
        $this->addSql('ALTER TABLE attestion DROP FOREIGN KEY FK_905312BEA2ACEBCC');
        $this->addSql('DROP TABLE attestion');
        $this->addSql('DROP TABLE convention');
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
