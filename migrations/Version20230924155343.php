<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230924155343 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE route_station (id INT AUTO_INCREMENT NOT NULL, route_id INT NOT NULL, station_id INT NOT NULL, route_order INT NOT NULL, departure_time DATETIME NOT NULL, INDEX IDX_676AA52934ECB4E6 (route_id), INDEX IDX_676AA52921BDB235 (station_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE route_station ADD CONSTRAINT FK_676AA52934ECB4E6 FOREIGN KEY (route_id) REFERENCES route (id)');
        $this->addSql('ALTER TABLE route_station ADD CONSTRAINT FK_676AA52921BDB235 FOREIGN KEY (station_id) REFERENCES station (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE route_station DROP FOREIGN KEY FK_676AA52934ECB4E6');
        $this->addSql('ALTER TABLE route_station DROP FOREIGN KEY FK_676AA52921BDB235');
        $this->addSql('DROP TABLE route_station');
    }
}
