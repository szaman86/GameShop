<?php
namespace App\Model\Table;

use App\Model\Entity\GenresCustomer;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GenresCustomers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Genres
 * @property \Cake\ORM\Association\BelongsTo $Customers
 */
class GenresCustomersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('genres_customers');
        $this->displayField('genres_id');
        $this->primaryKey(['genres_id', 'customers_id']);

        $this->belongsTo('Genres', [
            'foreignKey' => 'genres_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customers_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['genres_id'], 'Genres'));
        $rules->add($rules->existsIn(['customers_id'], 'Customers'));
        return $rules;
    }
}
