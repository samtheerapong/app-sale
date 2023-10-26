<?php

namespace app\modules\sauce\models;

/**
 * This is the ActiveQuery class for [[RawSauce]].
 *
 * @see RawSauce
 */
class RawSauceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return RawSauce[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return RawSauce|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
