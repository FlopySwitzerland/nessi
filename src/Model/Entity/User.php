<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * User Entity
 *
 * @property int $id
 * @property int $parent_id
 * @property int $group_id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $password
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $lft
 * @property int $rght
 *
 * @property \App\Model\Entity\ParentUser $parent_user
 * @property \App\Model\Entity\Group $group
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
    /**
     * Méthode requise par @AclBehavior pour déterminer le groupe d'appartenance de l'utilisateur
     * @return Group|null Groupe utilisateur
     */
    public function parentNode()
    {
        if (!$this->id) {
            return null;
        }
        if (isset($this->group_id)) {
            $group_id = $this->group_id;
        } else {
            $users_table = TableRegistry::get('Users');
            $user = $users_table->find('all', ['fields' => ['group_id']])->where(['id' => $this->id])->first();
            $group_id = $user->group_id;
        }
        if (!$group_id) {
            return null;
        }

        return ['Groups' => ['id' => $group_id]];
    }

    /**
     * Encodage du mot de passe
     * @param string $password Mot de passe à encoder
     * @return bool|string
     */
    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
