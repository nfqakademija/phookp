<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181117222600 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE hash ADD competition_id INT NOT NULL');
        $this->addSql('ALTER TABLE hash ADD CONSTRAINT FK_D1B862B87B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id_competition)');
        $this->addSql('CREATE INDEX IDX_D1B862B87B39D312 ON hash (competition_id)');
        $this->addSql('ALTER TABLE team ADD competition_id INT NOT NULL');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F7B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id_competition)');
        $this->addSql('CREATE INDEX IDX_C4E0A61F7B39D312 ON team (competition_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE hash DROP FOREIGN KEY FK_D1B862B87B39D312');
        $this->addSql('DROP INDEX IDX_D1B862B87B39D312 ON hash');
        $this->addSql('ALTER TABLE hash DROP competition_id');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F7B39D312');
        $this->addSql('DROP INDEX IDX_C4E0A61F7B39D312 ON team');
        $this->addSql('ALTER TABLE team DROP competition_id');
    }
}
