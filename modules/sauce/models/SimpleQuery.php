<?php

namespace app\modules\sauce\models;

/**
 * This is the ActiveQuery class for [[Simple]].
 *
 * @see Simple
 */
class SimpleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Simple[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Simple|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
