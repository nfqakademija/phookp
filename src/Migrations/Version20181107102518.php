<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181107102518 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE team (id_team INT AUTO_INCREMENT NOT NULL, team_name TINYTEXT NOT NULL, sector_nr INT DEFAULT NULL, email VARCHAR(45) DEFAULT NULL, PRIMARY KEY(id_team)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id_event INT AUTO_INCREMENT NOT NULL, event_name VARCHAR(90) NOT NULL, event_date DATETIME NOT NULL, event_duration INT NOT NULL, event_organiser VARCHAR(90) NOT NULL, event_organiser_email VARCHAR(90) NOT NULL, event_type VARCHAR(30) NOT NULL, event_approved TINYINT(1) NOT NULL, event_status VARCHAR(30) NOT NULL, PRIMARY KEY(id_event)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hash (id_hash INT AUTO_INCREMENT NOT NULL, event_id_event INT DEFAULT NULL, hash VARCHAR(90) NOT NULL, INDEX IDX_D1B862B893C7A247 (event_id_event), PRIMARY KEY(id_hash)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE hash ADD CONSTRAINT FK_D1B862B893C7A247 FOREIGN KEY (event_id_event) REFERENCES event (id_event)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE hash DROP FOREIGN KEY FK_D1B862B893C7A247');
        $this->addSql('DROP TABLE team');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE hash');
    }
}
