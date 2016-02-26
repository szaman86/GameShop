<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * GenresCustomersFixture
 *
 */
class GenresCustomersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'genres_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'customers_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_genres_has_customers_customers1_idx' => ['type' => 'index', 'columns' => ['customers_id'], 'length' => []],
            'fk_genres_has_customers_genres1_idx' => ['type' => 'index', 'columns' => ['genres_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['genres_id', 'customers_id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'MEMORY',
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
            'genres_id' => 1,
            'customers_id' => 1
        ],
    ];
}
