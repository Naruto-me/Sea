<?php
/**
 * Created by PhpStorm.
 * User: Sea
 * Date: 2018/6/28
 * Time: 21:51
 */

namespace App\Admin\Controllers;



use App\Models\Photo;
use App\Models\PhotoType;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class PhotoController extends BaseController
{
    use ModelForm;
    protected $mainMenu = '作品';

    public function index()
    {
        return Admin::content( function( Content $content)
        {
            $content->header( $this->mainMenu );
            $content->description('列表' );
            $content->body( $this->grid()->render());
        });
    }

    public function create()
    {
        return Admin::content( function( Content $content )
        {
            $content->header( $this->mainMenu );
            $content->description( '创建' );
            $content->body( $this->form() );
        });
    }

    public function edit( $id )
    {
        return Admin::content( function ( Content $content ) use ( $id )
        {
            $content->header( $this->mainMenu );
            $content->description( '编辑' );
            $content->body( $this->form()->edit($id) );
        });
    }

    private function grid()
    {
        return Photo::grid( function( Grid $grid)
        {
            $grid->column( 'id', 'ID' );
            $grid->column('img', '作品图')->image( '', 100 );
            $grid->column('type_id', '分类')->display( function ($type_id )
            {
                return PhotoType::whereIn('id', $type_id)->where('is_show', PhotoType::IS_SHOW_YES)->pluck('name');
            } )->map( function ( $type )
            {
                return '<label class="label label-success">'. $type .'</label>';
            } )->implode( '  ' );
            $grid->column( 'message', '作品描述' );
            $grid->column('camera', '拍摄相机' );
            $grid->column('focus', '焦距' )->display( function ( $focus)
            {
                return $focus.'mm';
            });
            $grid->column('aperture', '光圈')->display( function ( $aperture)
            {
                return '&fnof;/'.$aperture;
            });;
            $grid->column('shutter', '快门');
            $grid->column('ISO', 'ISO');
            $grid->is_show( '是否显示' )->display( function ( $is_show )
            {
                $isShowStatus = 'success';
                $isShowText = '是';
                if ( !$is_show )
                {
                    $isShowStatus = 'danger';
                    $isShowText = '否';
                }

                return '<label class="label label-' . $isShowStatus . '">' . $isShowText . '</label>';
            } );
            $grid->created_at( '创建时间' );
        });
    }

    private function form()
    {
        return Photo::form( function ( Form $form )
        {
            $form->image('img', '作品图')->rules('required')->uniqueName()->move('/images/photo')->help('图片比例: 333x200');
            $form->multipleSelect( 'type_id', '分类' )->options( PhotoType::options() )->rules('required', ['required' => '请选择分类']);
            $form->textarea( 'message', '作品描述' )->rows( 3 )->rules('required|max:50', ['required' => '作品描述不能为空', 'max' => '作品描述不能大于50字符']);
            $form->text( 'camera', '拍摄相机' )->rules( 'required|max:100', ['required' => 'code不能为空', 'max' => '拍摄相机不能大于100字符']);
            $form->number( 'focus', '焦距' )->min(0)->max(10000)->rules( 'required', ['required' => '焦距不能为空'] );
            $form->text( 'aperture', '光圈' )->rules( 'required', ['required' => '光圈不能为空'] );
            $form->text( 'shutter', '快门' )->rules( 'required', ['required' => '快门不能为空'] );
            $form->text( 'ISO', 'ISO' )->rules( 'required', ['required' => 'ISO不能为空'] );
            $isShowOptions = [
                'on' => ['value' => '1', 'color' => 'success', 'text' => '显示'],
                'off' => ['value' => '0', 'color' => 'danger', 'text' => '不显示']
            ];
            $form->switch( 'is_show', '是否显示' )->states( $isShowOptions )->default( '1' );
            $form->disableReset();
        });
    }
}