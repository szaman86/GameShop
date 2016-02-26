<?php
namespace App\Model\Table;

use App\Model\Entity\Genre;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Genres Model
 *
 * @property \Cake\ORM\Association\HasMany $Products
 * @property \Cake\ORM\Association\BelongsToMany $Customers
 */
class GenresTable extends Table
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

        $this->table('genres');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Products', [
            'foreignKey' => 'genre_id'
        ]);
        $this->belongsToMany('Customers', [
            'foreignKey' => 'genre_id',
            'targetForeignKey' => 'customer_id',
            'joinTable' => 'genres_customers'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('name');

        return $validator;
    }
}
