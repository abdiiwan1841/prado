<?php

Prado::using('System.Data.ActiveRecord.TActiveRecord');
require_once(__DIR__ . '/records/DepartmentRecord.php');

/**
 * @package System.Data.ActiveRecord
 */
class CountRecordsTest extends PHPUnit\Framework\TestCase
{
	public function setup()
	{
		$conn = new TDbConnection('mysql:host=localhost;dbname=prado_unitest', 'prado_unitest', 'prado_unitest');
		TActiveRecordManager::getInstance()->setDbConnection($conn);
	}

	public function test_count()
	{
		$finder = DepartmentRecord::finder();
		$count = $finder->count('`order` > ?', 2);
		$this->assertTrue($count > 0);
	}

	public function test_count_zero()
	{
		$finder = DepartmentRecord::finder();
		$count = $finder->count('`order` > ?', 11);
		$this->assertEquals($count, 0);
	}

	public function test_count_without_parameter()
	{
		$finder = DepartmentRecord::finder();
		$this->assertEquals($finder->count(), 8);
	}
}
