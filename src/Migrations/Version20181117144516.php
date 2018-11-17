<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181117144516 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE team ADD first_team_member VARCHAR(45) DEFAULT NULL, ADD third_team_member VARCHAR(45) DEFAULT NULL, DROP team_members');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F7B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id_competition)');
        $this->addSql('CREATE INDEX IDX_C4E0A61F7B39D312 ON team (competition_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F7B39D312');
        $this->addSql('DROP INDEX IDX_C4E0A61F7B39D312 ON team');
        $this->addSql('ALTER TABLE team ADD team_members VARCHAR(135) NOT NULL COLLATE utf8mb4_unicode_ci, DROP first_team_member, DROP third_team_member');
    }
}
