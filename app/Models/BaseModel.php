<?php

/**
 * Created by PhpStorm.
 *
 * User: Sea
 *
 * Date: 2018/6/25
 * Time: 15:31
 */
namespace App\Models;

use Encore\Admin\Traits\AdminBuilder;
use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    use AdminBuilder;
    const IS_SHOW_YES = '1';
    const IS_SHOW_NO  = '0';
    const IS_SHOW_ARR = [
        self::IS_SHOW_YES => '是',
        self::IS_SHOW_NO  => '否'
    ];

    static function boot()
    {
        parent::boot();
    }

    function scopeIsShow( $query )
    {
        $query->where( 'is_show', self::IS_SHOW_YES );
    }

}