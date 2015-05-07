<?php
/**
 * Created by PhpStorm.
 * User: oshry
 * Date: 4/10/15
 * Time: 11:57 PM
 */
namespace Search\Classes\Entity;

class Person {
    public $Id;
    public $fname;
    public $lname;
    public $bday;

//    function lname(){
//        return $this->lname." blat";
//    }
    function full_name() {
        return $this->fname.' '.$this->lname;
    }
    function time_to_bday(){
        $today=date_create(date("Y-m-d"));
        $birthday=date_create($this->bday);
        //Happy Birthday
        if($today == $birthday) return 'Happy Birthday';
        //Not Born Yet
        if($birthday > $today) return 'Invalid Date';

        $diff=date_diff($today,$birthday);
        $dec = ($diff->y > 0)?$diff->y*365:0;
        $days_to_birthday = 365 - ($diff->days - $dec);
        return $days_to_birthday;

    }
}