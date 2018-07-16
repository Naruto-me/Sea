<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoTable extends Migration
{

    protected $table = 'photo';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table,
            function (Blueprint $table) {
                $table->charset = 'utf8';
                $table->collation = 'utf8_general_ci';
                $table->increments('id');
                $table->string('type_id', 50)->comment('分类ID');
                $table->string('message', 50)->default('')->comment('描述');
                $table->string('camera', 200)->default('')->comment('相机');
                $table->string('focus', 10)->default('')->comment('焦距');
                $table->string('aperture', 10)->default('')->comment('光圈');
                $table->string('shutter', 20)->default('')->comment('快门');
                $table->string('ISO', 10)->default('')->comment('ISO');
                $table->enum('is_show', [0, 1])->default('1')->comment('是否显示');
                $table->dateTime('created_at')->comment('创建时间');
                $table->dateTime('updated_at')->comment('修改时间');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photo');
    }
}
