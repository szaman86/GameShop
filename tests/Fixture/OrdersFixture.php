<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrdersFixture
 *
 */
class OrdersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'products_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'customers_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_orders_products1_idx' => ['type' => 'index', 'columns' => ['products_id'], 'length' => []],
            'fk_orders_customers1_idx' => ['type' => 'index', 'columns' => ['customers_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id', 'customers_id'], 'length' => []],
            'fk_orders_customers1' => ['type' => 'foreign', 'columns' => ['customers_id'], 'references' => ['customers', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'fk_orders_products1' => ['type' => 'foreign', 'columns' => ['products_id'], 'references' => ['products', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_bin'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'products_id' => 1,
            'customers_id' => 1
        ],
    ];
}
