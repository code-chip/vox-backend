<?php

/**
 * @copyright  Copyright (c) 2025 Code Chip (https://codechip.com.br)
 * @author     Will <willvix@outlook.com>
 * @Link       https://github.com/code-chip
 */

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250601200612 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE company (id SERIAL NOT NULL, corporate_name VARCHAR(255) NOT NULL, trade_name VARCHAR(255) DEFAULT NULL, cnpj VARCHAR(14) NOT NULL, company_type VARCHAR(12) NOT NULL, phone VARCHAR(20) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, registration_status VARCHAR(9) NOT NULL, opening_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            COMMENT ON COLUMN company.opening_date IS '(DC2Type:datetime_immutable)'
        SQL);
        $this->addSql(<<<'SQL'
            COMMENT ON COLUMN company.created_at IS '(DC2Type:datetime_immutable)'
        SQL);
        $this->addSql(<<<'SQL'
            COMMENT ON COLUMN company.updated_at IS '(DC2Type:datetime_immutable)'
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE partner (id SERIAL NOT NULL, company_id INT NOT NULL, partner_name VARCHAR(255) NOT NULL, partner_type VARCHAR(12) NOT NULL, qualification VARCHAR(13) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_312B3E16979B1AD6 ON partner (company_id)
        SQL);
        $this->addSql(<<<'SQL'
            COMMENT ON COLUMN partner.created_at IS '(DC2Type:datetime_immutable)'
        SQL);
        $this->addSql(<<<'SQL'
            COMMENT ON COLUMN partner.updated_at IS '(DC2Type:datetime_immutable)'
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE "user" (id SERIAL NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON "user" (email)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE partner ADD CONSTRAINT FK_312B3E16979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE partner DROP CONSTRAINT FK_312B3E16979B1AD6
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE company
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE partner
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE "user"
        SQL);
    }
}
