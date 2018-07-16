<?php
/**
 * Created by PhpStorm.
 * User: Sea
 * Date: 2018/6/25
 * Time: 20:52
 */

namespace App\Models;


class PhotoType extends BaseModel
{

    public $table = 'photo_type';



    /**
     * 返回所有分类信息作为下拉选项
     *
     * @return array
     */
    static function options(): array
    {
        $all = self::all();
        $options = [];
        if( $all )
        {
            foreach( $all as $photo )
            {
                $options[ $photo->id ] = $photo->name;
            }
        }
        return $options;
    }
}