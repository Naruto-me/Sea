<?php
/**
 * Created by PhpStorm.
 * User: Sea
 * Date: 2018/6/28
 * Time: 20:58
 */

namespace App\Admin\Controllers;



use App\Models\PhotoType;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class TypesController extends BaseController
{
    use ModelForm;
    protected $mainMenu = '作品分类';

    public function index()
    {
        return Admin::content( function ( Content $content )
        {
            $content->header( $this->mainMenu );
            $content->description('列表' );
            $content->body($this->grid()->render() );
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
        return PhotoType::grid( function( Grid $grid)
        {
            $grid->disableRowSelector();
            $grid->disableExport();
            $grid->column( 'id', 'ID' );
            $grid->column( 'name', '分类名称' );
            $grid->actions(function ($actions){
                $actions->disableDelete();
            });
        });
    }

    private function form()
    {
        return PhotoType::form( function ( Form $form )
        {
            $form->display( 'id', 'ID' );
            $form->text( 'name', '分类名称' )->placeholder( '请输入分类名称' )->rules( 'required' );
            $isShowOptions = [
                'on' => ['value' => '1', 'color' => 'success', 'text' => '显示'],
                'off' => ['value' => '0', 'color' => 'danger', 'text' => '不显示']
            ];
            $form->switch( 'is_show', '是否显示' )->states( $isShowOptions )->default( '1' );
            $form->disableReset();
            $form->saving( function ( Form $form )
            {
            } );
        } );
    }
}