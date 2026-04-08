<?php
namespace Site\Model;

/**
 * model repository
 *
 * Manipulate the users in the db by adding updating or deleting users
 * 
 * Responsibilities:
 * - get user
 * - add new ones
 * - delete users
 * 
 * Dependencies:
 * - PDO
 * - User
 * - NotexistException
 * - DBException
 *
 * @package Site\Model
 * @author yassine elmsebli
 */

use PDO;
use Site\Entity\User;
use Site\Cacthers\NotexistException;
use Site\Cacthers\DBException;


class UsersDB extends DB {
    public function checklogin($adrmail, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :adrmail");
        $stmt->execute([':adrmail' => $adrmail]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (empty($row)) {
            return null; 
        }
        if (password_verify($password,$row['password'])) {
            return new User(
                $row['userid'],
                $row['name'],
                $row['email'],
                $row['phone']
            );
        }
        return null;
    }

    public function getuser($iduser){
    try {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE userid = :iduser");
        $stmt->execute([':iduser' => $iduser]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            throw new NotexistException("user with ID $iduser not exist");
        }
        return new User(
            $row['userid'],
            $row['name'],
            $row['email'],
            $row['phone']
        );
    } catch (PDOException $e) {
        throw new DBException("DB error");
    }
}

    public function updateuser($userid,$name,$email,$phone){
        $stmt = $this->db->prepare("UPDATE users SET email = :email, name=:name,phone=:phone WHERE userid=:userid");
        $stmt->execute([':userid' => $userid ,':email'=>$email ,':name'=>$name ,':phone'=>$phone]);
        if ($stmt->rowCount() === 0) {
            throw new NotexistException("the user with the ID $userid do not exist");
        }
    }

    //public function checkaccount($adrmail){
    //    $stmt = $this->db->prepare("SELECT user FROM users WHERE email =:adrmail");
    //    $stmt->execute([':adrmail'=>$adrmail]);
    //    $row = $stmt->fetchone(PDO::FETCH_ASSOC);
    //    if(empty($row)){
    //        return true;
    //    }else{
    //        return false;
    //    }
    //}

    public function createuser($name,$email,$phone,$password){
        $npassword=password_hash($password,PASSWORD_BCRYPT);
        $stmt = $this->db->prepare("SELECT email FROM users WHERE email = :email");
        $stmt->execute([':email'=>$email]);
        $row= $stmt->fetch(PDO::FETCH_ASSOC);
        if(empty($row)){
            $stmt = $this->db->prepare("INSERT INTO users (name,email,phone,password) VALUES (:name,:email,:phone,:password)");
            $stmt->execute([':email'=>$email ,':name'=>$name ,':phone'=>$phone,':password'=>$npassword]);
            $stmt = $this->db->prepare("SELECT userid FROM users WHERE email = :email");
            $stmt->execute([':email' => $email]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            OrderDB::createorder($row['userid']);
            return true;
        }
        return false;
    }

    public function deleteuser($id){
        $stmt = $this->db->prepare("DELETE FROM users WHERE userid = :id");
        $stmt->execute([':id'=>$id]);
        if ($stmt->rowCount() === 0) {
            throw new NotexistException("OrderPart with ID $idodrpart do not exist");
        }
    }
}
?>