<?php

use Spike\core\Application;

class m0002_add_password_column_users_table
{
    public function up()
    {
        $db = Application::$app->db;
        $db->pdo->exec("ALTER TABLE users ADD COLUMN password VARCHAR(512) NOT NULL;");
    }

    public function down()
    {
        $db = Application::$app->db;
        $db->pdo->exec("ALTER TABLE users DROP COLUMN password;");
    }
}