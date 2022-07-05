<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20220705063218 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add test data to reproduce the issue';
    }

    /**
     * @inheritDoc
     */
    public function up(Schema $schema): void
    {
        $this->addSql("
            INSERT INTO users (id, status, name) 
            VALUES ('4021d80d-d355-4d52-a0e8-8785e940cdff', 1, 'user1')
        ");
        $this->addSql("
            INSERT INTO users (id, status, name) 
            VALUES ('38d556a8-1492-4627-a502-504f8a268981', 0, 'user2')
        ");
        $this->addSql("
            INSERT INTO orders (id, user_id, user_status) 
            VALUES ('ca5311be-4575-4791-92a1-49978f02a6bc', '4021d80d-d355-4d52-a0e8-8785e940cdff', 1)
        ");
        $this->addSql("
            INSERT INTO orders (id, user_id, user_status) 
            VALUES ('c1b52914-ddf5-41cb-bceb-41c719f65cd7', '4021d80d-d355-4d52-a0e8-8785e940cdff', 1)
        ");
        $this->addSql("
            INSERT INTO orders (id, user_id, user_status) 
            VALUES ('146c673d-3834-4745-b001-6ee5b0df3447', '38d556a8-1492-4627-a502-504f8a268981', 0)
        ");
    }

    /**
     * @inheritDoc
     */
    public function down(Schema $schema): void
    {
    }
}
