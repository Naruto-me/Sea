<?php
/**
 * Created by PhpStorm.
 * User: Sea
 * Date: 2018/6/23
 * Time: 18:27
 */

namespace App\Http\Controllers;


use App\Models\Photo;
use App\Models\PhotoType;

class IndexController extends Controller
{

    public function index()
    {
        $types = PhotoType::IsShow()->get(['id', 'name'])->toArray();
        $photos = Photo::IsShow()->get()->toArray();

        $combine = [];
        foreach( $types as $type )
        {
            foreach( $photos as $photo )
            {
                if ( $photo != false && in_array($type['id'], $photo['type_id']) )
                {
                    $type['photos'][] = $photo;
                }

            }
            if( isset( $type['photos'] ) ) $combine[] = $type;
        }
        //print_r($combine);die(0);

        return view('index', ['combine' => $combine , 'app_url' => config('app.url').'/upload/'] );
    }
}