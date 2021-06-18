<?php
include_once __DIR__.'/../database/DB.php';

    class Mrendez_vous{
        function getSelect(){

            $sql="SELECT * FROM `rendez-vous`";
            $query=DB::connect()->query($sql);
            return $query->fetchAll();
        }

        function save($date,$typeConsultation,$horaire){
                      
            $sql="INSERT INTO `rendez-vous`(`date`, `typeConsultation`, `horaire`, `reference`) VALUES ('$date','$typeConsultation','$horaire', 'AZE123')";
            $query=DB::connect()->query($sql);
        }

        function edit($id){
   
            $sql="select * from `rendez-vous` where id=$id";

            $query=DB::connect()->query($sql);
            return $query->fetchAll();
        }

        function update($date,$typeConsultation,$horaire,$id){
           
            $sql="UPDATE `rendez-vous` SET date='$date',typeConsultation='$typeConsultation',horaire='$horaire' WHERE id = $id";
            
            $query=DB::connect()->query($sql);
        }

        function delete($id){

            $sql="delete from `rendez-vous` where id=$id";
            $query=DB::connect()->query($sql);
        }
    }



?>