<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20220629183408 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create orders & users';
    }

    /**
     * @inheritDoc
     */
    public function up(Schema $schema): void
    {
        $this->addSql('
            CREATE TABLE orders (
                id VARCHAR(36) NOT NULL,
                user_id VARCHAR(36) DEFAULT NULL,
                user_status INT DEFAULT 0,
                INDEX IDX_E52FFDEEA76ED3951E527E21 (user_id, user_status),
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        ');
        $this->addSql('
            CREATE TABLE users (
                id VARCHAR(36) NOT NULL,
                status INT DEFAULT 0 NOT NULL,
                name VARCHAR(25) NOT NULL,
                PRIMARY KEY(id, status)
           ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        ');
        $this->addSql('
            ALTER TABLE orders 
                ADD CONSTRAINT FK_E52FFDEEA76ED3951E527E21 FOREIGN KEY (user_id, user_status) 
                    REFERENCES users (id, status)
        ');
    }

    /**
     * @inheritDoc
     */
    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEEA76ED3951E527E21');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE users');
    }
}
