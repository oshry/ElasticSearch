<?php
/**
 * Created by PhpStorm.
 * User: oshry
 * Date: 5/5/15
 * Time: 6:13 PM
 */

namespace Search\Classes\Controller;


class Users {
    public function __construct($params){
        $this->query = isset($params['post']['query'])?$params['post']['query']:'oshry';
        $this->db = $params['app'];
        $this->entity = '\Search\Classes\Entity\Person';
    }
    public function action_search(){
        $search = $this->query;
        $id=1;
        $query = "SELECT CONCAT(u.fname, ' ', u.lname) as `full_name`, `u`.`bday`, `u`.`lname` FROM `Contacts` c
                  LEFT JOIN `Users` u ON c.fid = u.Id
                  WHERE ((CONCAT( u.fname,  ' ', u.lname ) LIKE  '%".$search."%')
                  OR (CONCAT( u.lname, ' ', u.fname) LIKE  '%".$search."%'))
                  AND c.uid=".$id;
        //$result_class = $this->db->query($query);
        $result_class = $this->db->fetch_class($query, $this->entity);
        $matches =[];
        $i=0;
        foreach($result_class as $person_class){
            //echo "<pre>",print_r($person_class),"</pre>";
            //$matches[$i]['lname'] = $person_class['lname'];
            //$matches[$i]['full_name'] = $person_class['full_name'];
            $matches[$i]['full_name'] = $person_class->full_name;
            $matches[$i]['time_to_bday'] = $person_class->time_to_bday();
            $i++;
        }
        return json_encode(array('matches' => $matches));
    }
    public function action_upcoming(){
        $id=1;
        $interval=3;
        $query = "SELECT * FROM `Contacts` c
                  LEFT JOIN `Users` u ON  c.fid = u.Id
                  WHERE  DATE_ADD(u.bday,
                  INTERVAL YEAR(CURDATE())-YEAR(u.bday) + IF(DAYOFYEAR(CURDATE()) > DAYOFYEAR(u.bday),1,0) YEAR)
                  BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL ".$interval." DAY)
                  AND c.uid=".$id;
        $result_class = $this->db->fetch_class($query, $this->entity);
        $matches =[];
        $i=0;
        foreach($result_class as $person_class){
            $matches[$i]['Id'] = $person_class->Id;
            $matches[$i]['fname'] = $person_class->fname;
            $matches[$i]['lname'] = $person_class->lname;
            $matches[$i]['bday'] = $person_class->bday;
            $matches[$i]['time_to_bday'] = $person_class->time_to_bday();
            $i++;
        }
        return json_encode(array('matches' => $matches));
    }

}