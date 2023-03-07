<?php

namespace App\Repositories\Admin;

use App\Models\Admin\DriverExtended;
use App\Repositories\BaseRepository;

/**
 * Class DriverExtendedRepository
 * @package App\Repositories\Admin
 * @version June 25, 2022, 7:46 am UTC
*/

class DriverExtendedRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'aditional_contact_no',
        'expriance',
        'post_ads_appartment',
        'post_ads_block_flat',
        'post_ads_proof',
        'post_ads_pincode',
        'post_ads_city',
        'post_ads_state',
        'post_ads_type',
        'resi_ads_apartment',
        'resi_ads_block_flate',
        'resi_ads_pincode',
        'resi_ads_city',
        'resi_ads_state',
        'resi_ads_proof',
        'license',
        'aadhar_card',
        'pancard',
        'light_bill',
        'language_known',
        'monthly_salary',
        'work_type',
        'work_station',
        'is_kyc_verify'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DriverExtended::class;
    }
}
