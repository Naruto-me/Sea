<?php
/**
 * Created by PhpStorm.
 * User: Sea
 * Date: 2018/6/25
 * Time: 20:55
 */

namespace App\Models;


class Photo extends BaseModel
{

    public $table = 'photo';

    /**
     * 自定义时间戳的名字
     */
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    function setTypeIdAttribute( $type_id )
    {
        if ( is_array($type_id) )
        {
            $this->attributes['type_id'] = implode(',', $type_id);
        }
    }

    function getTypeIdAttribute( $type_id )
    {
        return explode(',', $type_id);
    }
}