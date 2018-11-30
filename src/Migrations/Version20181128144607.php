<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181128144607 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE competition (id INT AUTO_INCREMENT NOT NULL, competition_name VARCHAR(90) NOT NULL, competition_date DATETIME NOT NULL, competition_duration INT NOT NULL, competition_organiser VARCHAR(90) NOT NULL, competition_organiser_email VARCHAR(90) NOT NULL, competition_type VARCHAR(30) NOT NULL, competition_approved TINYINT(1) NOT NULL, competition_status VARCHAR(30) NOT NULL, competition_teams_count INT NOT NULL, competition_weighings_count INT NOT NULL, competition_link VARCHAR(255) DEFAULT NULL, competition_rules VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hash (id INT AUTO_INCREMENT NOT NULL, competition_id INT NOT NULL, hash VARCHAR(40) NOT NULL, INDEX IDX_D1B862B87B39D312 (competition_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, competition_id INT NOT NULL, team_name VARCHAR(45) NOT NULL, sector_nr INT DEFAULT NULL, first_team_member VARCHAR(45) DEFAULT NULL, third_team_member VARCHAR(45) DEFAULT NULL, second_team_member VARCHAR(45) DEFAULT NULL, INDEX IDX_C4E0A61F7B39D312 (competition_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE result (id INT AUTO_INCREMENT NOT NULL, weighing_id INT NOT NULL, team_id INT NOT NULL, weigh INT NOT NULL, special_fish TINYINT(1) NOT NULL, INDEX IDX_136AC1132FEFE151 (weighing_id), INDEX IDX_136AC113296CD8AE (team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE weighing (id INT AUTO_INCREMENT NOT NULL, competition_id INT NOT NULL, weighing_time DATETIME DEFAULT NULL, weighing_nr INT NOT NULL, INDEX IDX_8FEC4CFC7B39D312 (competition_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE hash ADD CONSTRAINT FK_D1B862B87B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id)');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F7B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id)');
        $this->addSql('ALTER TABLE result ADD CONSTRAINT FK_136AC1132FEFE151 FOREIGN KEY (weighing_id) REFERENCES weighing (id)');
        $this->addSql('ALTER TABLE result ADD CONSTRAINT FK_136AC113296CD8AE FOREIGN KEY (team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE weighing ADD CONSTRAINT FK_8FEC4CFC7B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE hash DROP FOREIGN KEY FK_D1B862B87B39D312');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F7B39D312');
        $this->addSql('ALTER TABLE weighing DROP FOREIGN KEY FK_8FEC4CFC7B39D312');
        $this->addSql('ALTER TABLE result DROP FOREIGN KEY FK_136AC113296CD8AE');
        $this->addSql('ALTER TABLE result DROP FOREIGN KEY FK_136AC1132FEFE151');
        $this->addSql('DROP TABLE competition');
        $this->addSql('DROP TABLE hash');
        $this->addSql('DROP TABLE team');
        $this->addSql('DROP TABLE result');
        $this->addSql('DROP TABLE weighing');
    }
}
