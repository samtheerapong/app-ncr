<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $id
 * @property int|null $customer_id
 * @property string|null $full_name
 * @property string|null $address_line1
 * @property string|null $address_line2
 * @property string|null $city
 * @property string|null $state
 * @property string|null $country
 * @property string|null $postal_code
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id'], 'integer'],
            [['full_name'], 'string', 'max' => 128],
            [['address_line1', 'address_line2'], 'string', 'max' => 255],
            [['city'], 'string', 'max' => 64],
            [['state'], 'string', 'max' => 32],
            [['country'], 'string', 'max' => 65],
            [['postal_code'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'customer_id' => Yii::t('app', 'Customer ID'),
            'full_name' => Yii::t('app', 'Full Name'),
            'address_line1' => Yii::t('app', 'Address Line1'),
            'address_line2' => Yii::t('app', 'Address Line2'),
            'city' => Yii::t('app', 'City'),
            'state' => Yii::t('app', 'State'),
            'country' => Yii::t('app', 'Country'),
            'postal_code' => Yii::t('app', 'Postal Code'),
        ];
    }
    // Relation
    public function getCustomer()
    {
        $modelAddress = $this->hasOne(Customer::class, ['id' => 'customer_id']);
        
        return $modelAddress;
    }
}
