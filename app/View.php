<?php 

namespace App;

use App\Model\Sql;

class View
{
    // Get all phrases
    public static function getAllPhrases()
    {
        $sql = new Sql();
        $phrases =  $sql->select("SELECT * FROM phrases");
        echo json_encode($phrases);
    }

    // Get phrase by id_phrase
    public static function getPhrase($id_phrase)
    {
        $sql = new Sql();
        $phrases =  $sql->select("SELECT * FROM phrases WHERE id_phrase = :id_phrase",[
            ":id_phrase" => $id_phrase
        ]);
        echo json_encode($phrases);
        
    }

    
    // Create phrase
    public static function setPhrase($data)
    {
        $sql = new Sql();
        $sql->query("INSERT INTO phrases (phrase, name_creator, email_creator) VALUES (:phrase, :name_creator, :email_creator)",[
            ":phrase" => $data['phrase'],
            ":name_creator" => (isset($data['name_creator'])) ? $data['name_creator'] : NULL,
            ":email_creator" => (isset($data['email_creator'])) ? $data['email_creator'] : NULL,

        ]);
        $phrases =  $sql->select("SELECT * FROM phrases");
        echo json_encode($phrases);
    }

    // Delete phrase by id_phrase
    public static function deletePhrase($id_phrase)
    {
        $sql = new Sql();
        $sql->query("DELETE FROM phrases WHERE id_phrase = :id_phrase",[
            ":id_phrase" =>  $id_phrase
        ]);
    }
}