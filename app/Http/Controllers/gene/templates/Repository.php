<?php
 
namespace App\Repositories\%parent%\%Model%;

use App\Models\%Model%;
use App\Repositories\BaseRepository;
use App\Repositories\Traits\CacheResults;

 
class %Model%Repository  extends BaseRepository implements %Model%RepositoryInterface
{
   
    use CacheResults;
    protected $model;

	public function __construct(%Model% $model) {
       
		parent::__construct($model);
	}
}
