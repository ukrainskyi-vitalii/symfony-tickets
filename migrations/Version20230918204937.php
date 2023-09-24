<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230918204937 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE route_station DROP FOREIGN KEY FK_676AA52921BDB235');
        $this->addSql('ALTER TABLE route_station DROP FOREIGN KEY FK_676AA52934ECB4E6');
        $this->addSql('ALTER TABLE ticket_price DROP FOREIGN KEY FK_E2F8415234ECB4E6');
        $this->addSql('ALTER TABLE ticket_price DROP FOREIGN KEY FK_E2F84152766102BE');
        $this->addSql('ALTER TABLE ticket_price DROP FOREIGN KEY FK_E2F84152FF134AA1');
        $this->addSql('DROP TABLE route_station');
        $this->addSql('DROP TABLE ticket_price');
        $this->addSql('DROP TABLE route');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE route_station (id INT AUTO_INCREMENT NOT NULL, route_id INT NOT NULL, station_id INT NOT NULL, route_order INT NOT NULL, INDEX IDX_676AA52934ECB4E6 (route_id), INDEX IDX_676AA52921BDB235 (station_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE ticket_price (id INT AUTO_INCREMENT NOT NULL, route_id INT NOT NULL, departure_station_id INT NOT NULL, arrival_station_id INT NOT NULL, price NUMERIC(5, 2) NOT NULL, departure_time TIME NOT NULL, arrival_time TIME NOT NULL, INDEX IDX_E2F8415234ECB4E6 (route_id), INDEX IDX_E2F84152FF134AA1 (departure_station_id), INDEX IDX_E2F84152766102BE (arrival_station_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE route (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE route_station ADD CONSTRAINT FK_676AA52921BDB235 FOREIGN KEY (station_id) REFERENCES station (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE route_station ADD CONSTRAINT FK_676AA52934ECB4E6 FOREIGN KEY (route_id) REFERENCES route (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE ticket_price ADD CONSTRAINT FK_E2F8415234ECB4E6 FOREIGN KEY (route_id) REFERENCES route (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE ticket_price ADD CONSTRAINT FK_E2F84152766102BE FOREIGN KEY (arrival_station_id) REFERENCES station (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE ticket_price ADD CONSTRAINT FK_E2F84152FF134AA1 FOREIGN KEY (departure_station_id) REFERENCES station (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
