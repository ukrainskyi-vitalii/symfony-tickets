<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230924162230 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE schedule (id INT AUTO_INCREMENT NOT NULL, route_station_id INT NOT NULL, departure_time_id INT NOT NULL, INDEX IDX_5A3811FB2FCA78D2 (route_station_id), INDEX IDX_5A3811FB44CD9A8A (departure_time_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FB2FCA78D2 FOREIGN KEY (route_station_id) REFERENCES route_station (id)');
        $this->addSql('ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FB44CD9A8A FOREIGN KEY (departure_time_id) REFERENCES departure_time (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE schedule DROP FOREIGN KEY FK_5A3811FB2FCA78D2');
        $this->addSql('ALTER TABLE schedule DROP FOREIGN KEY FK_5A3811FB44CD9A8A');
        $this->addSql('DROP TABLE schedule');
    }
}
