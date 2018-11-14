<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181101230147 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE team (id_team INT AUTO_INCREMENT NOT NULL, team_name TINYTEXT NOT NULL, sector_nr INT DEFAULT NULL, email VARCHAR(45) DEFAULT NULL, PRIMARY KEY(id_team)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE competition CHANGE event_duration event_duration INT NOT NULL, CHANGE event_approved event_approved TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE team');
        $this->addSql('ALTER TABLE competition CHANGE event_duration event_duration INT DEFAULT 1, CHANGE event_approved event_approved TINYINT(1) DEFAULT \'0\'');
    }
}
