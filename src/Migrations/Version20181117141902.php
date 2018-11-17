<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181117141902 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE team ADD team_members VARCHAR(135) NOT NULL, DROP first_team_member, DROP second_team_member, DROP third_team_member');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE team ADD first_team_member VARCHAR(45) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD second_team_member VARCHAR(45) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD third_team_member VARCHAR(45) DEFAULT NULL COLLATE utf8mb4_unicode_ci, DROP team_members');
    }
}
