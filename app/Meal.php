<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'meals';

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
	protected $dateFormat = 'Y-m-d';

    protected $fillable = [
    			'availabledate',
				'breakfast1',
				'breakfast2',
				'lunch1',
				'lunch2',
				'soup1',
				'soup2',
				'teatime1',
				'teatime2',
				'dinner1',
				'dinner2',
				'supper1',
				'supper2',
				];
				
	protected $dates = ['availabledate'];
	//protected $primaryKey = 'availabledate';


}
