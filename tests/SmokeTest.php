<?php

use PHPUnit\Framework\TestCase;

/**
 * Every class the plugin ships autoloads (catches syntax errors, bad namespaces and missing dependencies).
 */
class SmokeTest extends TestCase
{
    /**
     * @dataProvider classes
     */
    public function testClassLoads(string $class): void
    {
        $this->assertTrue(class_exists($class) || interface_exists($class) || trait_exists($class), $class);
    }

    public function classes(): array
    {
        return [
            ['Analyzer\\Model\\Entity\\Request'],
            ['Analyzer\\Model\\Entity\\Visitor'],
            ['Analyzer\\Model\\Table\\RequestsTable'],
            ['Analyzer\\Model\\Table\\VisitorsTable'],
            ['Analyzer\\Plugin'],
            ['Analyzer\\Routing\\Middleware\\AnalyzerMiddleware'],
        ];
    }
}
