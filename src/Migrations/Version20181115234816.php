<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181115234816 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE hash (id INT AUTO_INCREMENT NOT NULL, competition_id INT NOT NULL, hash VARCHAR(40) NOT NULL, INDEX IDX_D1B862B87B39D312 (competition_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE hash ADD CONSTRAINT FK_D1B862B87B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id_competition)');
        $this->addSql('ALTER TABLE competition ADD competition_sector_count INT NOT NULL, ADD competition_weighings_count INT NOT NULL, CHANGE competition_duration competition_duration INT NOT NULL, CHANGE competition_approved competition_approved TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE team ADD competition_id INT NOT NULL, ADD second_team_member VARCHAR(45) DEFAULT NULL, ADD third_team_member VARCHAR(45) DEFAULT NULL, DROP team_member, CHANGE team_name team_name VARCHAR(45) NOT NULL, CHANGE email first_team_member VARCHAR(45) DEFAULT NULL');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F7B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id_competition)');
        $this->addSql('CREATE INDEX IDX_C4E0A61F7B39D312 ON team (competition_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE hash');
        $this->addSql('ALTER TABLE competition DROP competition_sector_count, DROP competition_weighings_count, CHANGE competition_duration competition_duration INT DEFAULT 1 NOT NULL, CHANGE competition_approved competition_approved TINYINT(1) DEFAULT \'0\' NOT NULL');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F7B39D312');
        $this->addSql('DROP INDEX IDX_C4E0A61F7B39D312 ON team');
        $this->addSql('ALTER TABLE team ADD email VARCHAR(45) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD team_member VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, DROP competition_id, DROP first_team_member, DROP second_team_member, DROP third_team_member, CHANGE team_name team_name TINYTEXT NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
