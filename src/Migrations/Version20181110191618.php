<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181110191618 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql(' ALTER TABLE competition CHANGE id_competition id_competition INT AUTO_INCREMENT NOT NULL');
        $this->addSql(' ALTER TABLE competition CHANGE event_name competition_name VARCHAR(90) NOT NULL');
        $this->addSql(' ALTER TABLE competition CHANGE event_date competition_date DATETIME NOT NULL');
        $this->addSql(' ALTER TABLE competition CHANGE event_duration competition_duration INT NOT NULL DEFAULT 1');
        $this->addSql(' ALTER TABLE competition CHANGE event_organiser competition_organiser VARCHAR(90) NOT NULL');
        $this->addSql(' ALTER TABLE competition CHANGE event_organiser_email competition_organiser_email VARCHAR(90) NOT NULL');
        $this->addSql(' ALTER TABLE competition CHANGE event_approved competition_approved TINYINT(1) NOT NULL DEFAULT 0');
        $this->addSql(' ALTER TABLE competition CHANGE event_status competition_status VARCHAR(30) NOT NULL');




    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql('  ALTER TABLE competition CHANGE id_competition id_competition INT AUTO_INCREMENT NOT NULL');
        $this->addSql(' ALTER TABLE competition CHANGE competition_name event_name VARCHAR(90) NOT NULL');
        $this->addSql(' ALTER TABLE competition CHANGE competition_date event_date DATETIME NOT NULL');
        $this->addSql(' ALTER TABLE competition CHANGE competition_duration event_duration INT NOT NULL DEFAULT 1');
        $this->addSql(' ALTER TABLE competition CHANGE competition_organiser event_organiser VARCHAR(90) NOT NULL');
        $this->addSql(' ALTER TABLE competition CHANGE competition_organiser_email event_organiser_email VARCHAR(90) NOT NULL');
        $this->addSql(' ALTER TABLE competition CHANGE competition_approved event_approved TINYINT(1) NOT NULL DEFAULT 0');
        $this->addSql(' ALTER TABLE competition CHANGE competition_status event_status VARCHAR(30) NOT NULL');



    }
}
