<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('obns', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('train_id');
            $table->foreign('train_id')->references('id')->on('trains');
            
            //todo USERS
            $table->string('users', 5);
            
            //todo MARCLI
            // ce0p0 
            $table->string('m0',10);
            $table->string('status0',20);
            $table->string('slot0',3);
            $table->string('tech0',10);
            $table->string('iccid0', 25);
            // ce1p0
            $table->string('m1',10);
            $table->string('status1',20);
            $table->string('slot1',3);
            $table->string('tech1',10);
            $table->string('iccid1', 25);
            // ce2p0 
            $table->string('m2',10);
            $table->string('status2',20);
            $table->string('slot2',3);
            $table->string('tech2',10);
            $table->string('iccid2', 25);
            
            //todo SWITCH
            // Switch 1
            $table->string('sw1',5);
            $table->string('swip1',20);
            $table->string('swfw1');
            $table->string('swconf1');
            // Switch 2
            $table->string('sw2',5);
            $table->string('swip2',20);
            $table->string('swfw2');
            $table->string('swconf2');
            // Switch 3
            $table->string('sw3',5);
            $table->string('swip3',20);
            $table->string('swfw3');
            $table->string('swconf3');
            // Switch 4
            $table->string('sw4',5);
            $table->string('swip4',20);
            $table->string('swfw4');
            $table->string('swconf4');
            // Switch 5
            $table->string('sw5',5);
            $table->string('swip5',20);
            $table->string('swfw5');
            $table->string('swconf5');
            // Switch 6
            $table->string('sw6',5);
            $table->string('swip6',20);
            $table->string('swfw6');
            $table->string('swconf6');
            // Switch 7
            $table->string('sw7',5);
            $table->string('swip7',20);
            $table->string('swfw7');
            $table->string('swconf7');
            
            //todo ACCESS POINT
            // AP 1
            $table->string('ap1',5);
            $table->string('apip1',20);
            $table->string('apfw1');
            $table->string('apconf1');
            // AP 2
            $table->string('ap2',5);
            $table->string('apip2',20);
            $table->string('apfw2');
            $table->string('apconf2');
            // AP 3
            $table->string('ap3',5);
            $table->string('apip3',20);
            $table->string('apfw3');
            $table->string('apconf3');
            // AP 4
            $table->string('ap4',5);
            $table->string('apip4',20);
            $table->string('apfw4');
            $table->string('apconf4');
            // AP 5
            $table->string('ap5',5);
            $table->string('apip5',20);
            $table->string('apfw5');
            $table->string('apconf5');
            // AP 6
            $table->string('ap6',5);
            $table->string('apip6',20);
            $table->string('apfw6');
            $table->string('apconf6');
            // AP 7
            $table->string('ap7',5);
            $table->string('apip7',20);
            $table->string('apfw7');
            $table->string('apconf7');
            // AP 8
            $table->string('ap8',5);
            $table->string('apip8',20);
            $table->string('apfw8');
            $table->string('apconf8');
            // AP 9
            $table->string('ap9',5);
            $table->string('apip9',20);
            $table->string('apfw9');
            $table->string('apconf9');
            // AP 10
            $table->string('ap10',5);
            $table->string('apip10',20);
            $table->string('apfw10');
            $table->string('apconf10');
            // AP 11
            $table->string('ap11',5);
            $table->string('apip11',20);
            $table->string('apfw11');
            $table->string('apconf11');
            // AP 12
            $table->string('ap12',5);
            $table->string('apip12',20);
            $table->string('apfw12');
            $table->string('apconf12');
            // AP 13
            $table->string('ap13',5);
            $table->string('apip13',20);
            $table->string('apfw13');
            $table->string('apconf13');
            // AP 14
            $table->string('ap14',5);
            $table->string('apip14',20);
            $table->string('apfw14');
            $table->string('apconf14');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obns');
    }
};
