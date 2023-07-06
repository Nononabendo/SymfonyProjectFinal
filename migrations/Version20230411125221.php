<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230411125221 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carousel DROP header, DROP header_middle, DROP header_bottom, DROP middle_top, DROP middle_mid, DROP middle_bottom, DROP footer_top, DROP footer_mid, DROP footer');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carousel ADD header VARCHAR(255) DEFAULT NULL, ADD header_middle VARCHAR(255) DEFAULT NULL, ADD header_bottom VARCHAR(255) DEFAULT NULL, ADD middle_top VARCHAR(255) DEFAULT NULL, ADD middle_mid VARCHAR(255) DEFAULT NULL, ADD middle_bottom VARCHAR(255) DEFAULT NULL, ADD footer_top VARCHAR(255) DEFAULT NULL, ADD footer_mid VARCHAR(255) DEFAULT NULL, ADD footer VARCHAR(255) DEFAULT NULL');
    }
}
