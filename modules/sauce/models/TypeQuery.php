<?php

namespace app\modules\sauce\models;

/**
 * This is the ActiveQuery class for [[type]].
 *
 * @see type
 */
class TypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return type[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return type|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
