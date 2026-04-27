<?php
namespace Site\Model;

/**
 * Accès aux données des Utilisateur.
 *
 * Fournit les opérations de lecture et d'écriture
 * sur la table Users.
 *
 * @package  Site\Model
 * @author   Yassine Elmsebli
 */

use PDO;
use Site\Entity\User;
use Site\Cacthers\NotexistException;
use Site\Cacthers\DBException;


class UsersDB extends DB {
    /**
     * Verifie si les informations d'un utilisateur afin de le connecter.
     *
     * @param  string       $adrmail        Address mail de connexion
     * @param  string       $password       Mot de passe de connexion
     *
     * @return User      renvoie l'utilisateur si il existe et que les valeurs sont bonne , null sinon
     *
     */
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

    /**
     * Recherche et renvoie un utilisateur celon son identifiant.
     *
     * @param  int         $iduser         Identifiant de l'utilisateur
     *
     * @return User     Renvoie l'utilisateur si il existe
     *
     * @throws NotexistException  Si l'utilisateur n'existe pas
     * @throws DBException        En cas d'erreur de connexion
     */
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

    /**
     * Renvoie une utilisateur celon son address mail.
     *
     * @param  string         $email         Addresse de l'utilisateur
     *
     * @return User           Renvoie l'utilisateur si il existe
     * 
     * @throws NoetexistException   si l'utilisteur n'existe pas
     * @throws PDOException         si une erreur lors de la connexion
     */
    public function getusermail($email){
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->execute([':email' => $email]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$row) {
                throw new NotexistException("user with email $email not exist");
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

    /**
     * Met a jour les valeurs d'un utilisateur.
     *
     * @param  int         $userid          Identifiant de l'utilisateur 
     * @param  string      $name            Nom de l'utilisateur
     * @param  string      $email           Addresse de l'utilisateur
     * @param  string      $phone           Numéro de téléphone de l'utilisateur
     * 
     * 
     * @throws NotexistException  si l'utilisateur n'existe pas
     *
     */
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

    /**
     * Crée un utilisateur.
     *
     * @param  string      $name            Nom de l'utilisateur
     * @param  string      $email           Adresse mail de l'utilisateur
     * @param  string      $phone           Numéro de téléphone
     * @param  string      $password        Mot de passe en clair (hashé en interne)
     *
     * @return bool  true si créé, false si l'email est déjà utilisé
     *
     */

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
            $ordersDB = new OrderDB();
            $ordersDB->createorder($row['userid']);
            return true;
        }
        return false;
    }
    /**
     * Supprime un utilisateur donnée
     *
     * @param  int         $id          Identifiant de l'utilisateur 
     * 
     * 
     * @throws NotexistException  si l'utilisateur n'existe pas
     *
     */
    public function deleteuser($id){
        $stmt = $this->db->prepare("DELETE FROM users WHERE userid = :id");
        $stmt->execute([':id'=>$id]);
        if ($stmt->rowCount() === 0) {
            throw new NotexistException("OrderPart with ID $idodrpart do not exist");
        }
    }
}
?>