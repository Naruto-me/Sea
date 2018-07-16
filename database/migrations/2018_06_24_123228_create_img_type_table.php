<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImgTypeTable extends Migration
{

    protected $table = 'photo_type';
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
                $table->string('name', 50)->default('')->comment('分类名称');
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
        Schema::dropIfExists($this->table);
    }
}
