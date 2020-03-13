<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        SET GLOBAL event_scheduler="ON";
        ');
        DB::unprepared("
        DROP EVENT IF EXISTS `ev_receiveSeq_truncate`;
        CREATE EVENT ev_receiveSeq_truncate
        ON SCHEDULE EVERY '1' MONTH
        STARTS '2020-01-01 00:00:00'
        DO 
        BEGIN
        TRUNCATE TABLE `receive_seqs` ;
        END ;
        ");
        DB::unprepared('
        CREATE TRIGGER tr_Receive_Seq BEFORE INSERT ON `receives` FOR EACH ROW
            BEGIN
            INSERT INTO `receive_seqs` VALUES (NULL , year(CURDATE()) , month(CURDATE())  );
            SET new.receive_no = CONCAT("IN" ,year(CURDATE()) + 543,LPAD(month(CURDATE()), 2,"0"), "-",LPAD(LAST_INSERT_ID(), 3, "0"));
            END
        ');
        DB::unprepared("
        DROP EVENT IF EXISTS `ev_retireSeq_truncate`;
        CREATE EVENT ev_retireSeq_truncate
        ON SCHEDULE EVERY '1' MONTH
        STARTS '2020-01-01 00:00:00'
        DO 
        BEGIN
        TRUNCATE TABLE `retire_seqs` ;
        END ;
        ");
        DB::unprepared('
        CREATE TRIGGER tr_Retires_Seq BEFORE INSERT ON `retires` FOR EACH ROW
            BEGIN
            INSERT INTO `retire_seqs` VALUES (NULL , year(CURDATE()) , month(CURDATE())  );
            SET new.retire_no = CONCAT("OUT" ,year(CURDATE()) + 543,LPAD(month(CURDATE()), 2,"0"), "-",LPAD(LAST_INSERT_ID(), 3, "0"));
            END
        ');   
        DB::unprepared('
        CREATE TRIGGER tr_Asset_Modoel_Seq BEFORE INSERT ON `assetmodels` FOR EACH ROW
            BEGIN
            INSERT INTO `asset_model_seqs` VALUES (NULL);
            SET new.asset_m_no = CONCAT(LPAD(LAST_INSERT_ID(), 3, "0"));
            END
        ');   
        DB::unprepared("
        DROP EVENT IF EXISTS `ev_joborderSeq_truncate`;
        CREATE EVENT ev_joborderSeq_truncate
        ON SCHEDULE EVERY '1' MONTH
        STARTS '2020-01-01 00:00:00'
        DO 
        BEGIN
        TRUNCATE TABLE `joborder_seqs` ;
        END ;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('SET GLOBAL event_scheduler="OFF";');
        DB::unprepared('DROP EVENT IF EXISTS `ev_receiveSeq_truncate`');
        DB::unprepared('DROP TRIGGER `tr_Receive_Seq`;');
        DB::unprepared('SET GLOBAL event_scheduler="OFF";');
        DB::unprepared('DROP EVENT IF EXISTS `ev_retireSeq_truncate`');
        DB::unprepared('DROP TRIGGER `tr_Retires_Seq`;');
        DB::unprepared('DROP TRIGGER `tr_Asset_Modoel_Seq`;');
        DB::unprepared('DROP EVENT IF EXISTS `ev_joborderSeq_truncate`');
    }
}
