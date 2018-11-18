<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181117222446 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE competition (id_competition INT AUTO_INCREMENT NOT NULL, competition_name VARCHAR(90) NOT NULL, competition_date DATETIME NOT NULL, competition_duration INT NOT NULL, competition_organiser VARCHAR(90) NOT NULL, competition_organiser_email VARCHAR(90) NOT NULL, competition_type VARCHAR(30) NOT NULL, competition_approved TINYINT(1) NOT NULL, competition_status VARCHAR(30) NOT NULL, competition_sector_count INT NOT NULL, competition_weighings_count INT NOT NULL, competition_link VARCHAR(45) DEFAULT NULL, competition_rules VARCHAR(135) DEFAULT NULL, PRIMARY KEY(id_competition)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team (id_team INT AUTO_INCREMENT NOT NULL, team_name VARCHAR(45) NOT NULL, sector_nr INT DEFAULT NULL, first_team_member VARCHAR(45) DEFAULT NULL, third_team_member VARCHAR(45) DEFAULT NULL, second_team_member VARCHAR(45) DEFAULT NULL, PRIMARY KEY(id_team)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP INDEX IDX_D1B862B87B39D312 ON hash');
        $this->addSql('ALTER TABLE hash DROP competition_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE competition');
        $this->addSql('DROP TABLE team');
        $this->addSql('ALTER TABLE hash ADD competition_id INT NOT NULL');
        $this->addSql('CREATE INDEX IDX_D1B862B87B39D312 ON hash (competition_id)');
    }
}
