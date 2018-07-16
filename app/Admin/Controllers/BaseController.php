<?php
/**
 * Created by PhpStorm.
 * User: Sea
 * Date: 2018/6/28
 * Time: 20:54
 */

namespace App\Admin\Controllers;


use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

abstract class BaseController extends Controller
{
    use ModelForm;
    protected $mainMenu = '';

}