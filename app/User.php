<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail as ContractMustVerifyEmail;
use Litepie\User\Models\User as Authenticatable;
use Litepie\User\Traits\Auth\MustVerifyEmail;

class User extends Authenticatable implements ContractMustVerifyEmail
{
    use MustVerifyEmail;
    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $config = 'users.user.model';
}