<?php

use CodeIgniter\Test\CIUnitTestCase;

/**
 * @internal
 */
final class ExampleDatabaseTest extends CIUnitTestCase
{
    public function testRequiredRoutesAreDeclared(): void
    {
        $routes = file_get_contents(APPPATH . 'Config/Routes.php');

        $this->assertIsString($routes);
        $this->assertStringContainsString("\$routes->get('/', 'Pages::index');", $routes);
        $this->assertStringContainsString("\$routes->get('tasks', 'Tasks::index');", $routes);
        $this->assertStringContainsString("\$routes->get('profile', 'Profile::index');", $routes);
        $this->assertStringContainsString("\$routes->get('about', 'Pages::about');", $routes);
    }

    public function testSqlContainsRequiredSampleRecords(): void
    {
        $sql = file_get_contents(ROOTPATH . 'database/tasks_for_today.sql');

        $this->assertIsString($sql);
        preg_match('/INSERT INTO tasks.+?VALUES\s*(.+?);/s', $sql, $taskInsert);
        $taskRows = preg_split('/\R/', trim($taskInsert[1] ?? ''));
        $this->assertCount(8, $taskRows);
        $this->assertSame(4, substr_count($taskInsert[1] ?? '', ', @today, @manila_now)'));

        preg_match('/INSERT INTO users.+?VALUES\s*(.+?);/s', $sql, $userInsert);
        $userRows = preg_split('/\R/', trim($userInsert[1] ?? ''));
        $this->assertCount(1, $userRows);
        $this->assertStringContainsString("'vinceacedillo'", $userInsert[1] ?? '');
    }
}
