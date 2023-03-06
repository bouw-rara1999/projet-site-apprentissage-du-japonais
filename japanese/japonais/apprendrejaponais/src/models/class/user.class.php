<?php
require_once('./src/models/class/database.class.php');

class User extends Database
{

  public int $id;
  public string $pseudo;
  public string $mail;
  private string $password;
  public string $avatar;

  public function __construct()
  {
    parent::__construct();
  }

  public function getUser($pseudo)
  {
    $stmt = $this->pdo->prepare("SELECT * FROM users WHERE mail = :pseudo OR pseudo = :pseudo ");
    $stmt->execute([':pseudo' => $pseudo]);
    return $stmt->fetch();
  
  }


  public function userRegistered($user)
  {
    $userRegistered = $this->pdo->prepare("INSERT INTO users (pseudo, mail, password) VALUES (:pseudo, :mail, :password)");
    return $userRegistered->execute($user);
  }

  function checkIfPasswordOK($pseudo, $password)
  {
    $checkIfPasswordOkExist = $this->pdo->prepare("SELECT password FROM users WHERE pseudo=:pseudo OR mail=:mail");

    $checkIfPasswordOkExist->BindParam(":pseudo", "$pseudo");
    $checkIfPasswordOkExist->BindParam(":email", "$pseudo");
    $checkIfPasswordOkExist->execute();

    $return = $checkIfPasswordOkExist->fetchAll();
    $result = false;

    if ($password == $return[0]["password"]) {
      $result = true;
    }
    return $result;
  }

  function getHashePassword($pseudo)
  {
    $getHashePassword = $this->pdo->prepare("SELECT password FROM users WHERE pseudo=:pseudo");
    $getHashePassword->BindParam(":pseudo", $pseudo);
    $getHashePassword->execute();
    $return = $getHashePassword->fetchAll();

    return $return;
  }

 


    /**
   * Checks if mail exists in database.
   * @param string $mail Mail to check
   * @return bool
   */
  private function pseudoExistsInDb(string $pseudo): bool
  {
    $checkpseudo = $this->pdo->prepare("SELECT * FROM users WHERE pseudo = :pseudo");
    $checkpseudo->bindParam(':pseudo', $pseudo);
    $checkpseudo->execute();
    $rows = $checkpseudo->fetchAll(PDO::FETCH_ASSOC);
    return count($rows) > 0;
  }

  private function updatepseudo(string $pseudoToUpdate, string $newpseudo): void
  {
    $updatepseudo = $this->pdo->prepare("UPDATE users SET pseudo = :newpseudo WHERE pseudo = :currentpseudo");
    $updatepseudo->bindParam(':newmail', $newpseudo);
    $updatepseudo->bindParam(':currentmail', $pseudoToUpdate);

    $updatepseudo->execute();
  }

  public function modifpseudo()
  {
    $currentpseudo = trim($_POST['currentpseudo']);
    $newpseudo = trim($_POST['newpseudo']);
    $modalTitle = 'Erreur';

    if ($this->pseudoExistsInDb($currentpseudo)) {
      if (!$this->pseudoExistsInDb($newpseudo)) {

        try {
          $this->updatepseudo($currentpseudo, $newpseudo);
          $result1 = "Le changement de pseudo a été effectué avec succès.";
          $modalTitle = 'Succès';
        } catch (PDOException $e) {
          $result1 = "Une erreur inattendue est survenue.";
        }
      } else {
        $result1 = "Ce pseudo est déjà utilisée par un autre utilisateur.";
      }
    } else {
      $result1 = "Le pseudo à modifier n'existe pas.";
    

      }
      return json_encode(['message' => $result1, 'modalTitle' => $modalTitle]);
    }

    
    


  /**
   * Checks if mail exists in database.
   * @param string $mail Mail to check
   * @return bool
   */
  private function mailExistsInDb(string $mail): bool
  {
    $checkmail = $this->pdo->prepare("SELECT * FROM users WHERE mail = :mail");
    $checkmail->bindParam(':mail', $mail);
    $checkmail->execute();
    $rows = $checkmail->fetchAll(PDO::FETCH_ASSOC);
    return count($rows) > 0;
  }

  /**
   * Updates mail in database.
   * @param string $mailToUpdate
   * @param string $newMail
   * @return void
   */
  private function updateMail(string $mailToUpdate, string $newMail): void
  {
    $updatemail = $this->pdo->prepare("UPDATE users SET mail = :newmail WHERE mail = :currentmail");
    $updatemail->bindParam(':newmail', $newMail);
    $updatemail->bindParam(':currentmail', $mailToUpdate);

    $updatemail->execute();
  }

  public function modifmail()
  {
    $currentmail = trim($_POST['currentmail']);
    $newmail = filter_var(trim($_POST['newmail']), FILTER_SANITIZE_EMAIL);
    $modalTitle = 'Erreur';

    if ($this->mailExistsInDb($currentmail)) {
      if (!$this->mailExistsInDb($newmail)) {

        try {
          $this->updateMail($currentmail, $newmail);
          $result1 = "Le changement de mail a été effectué avec succès.";
          $modalTitle = 'Succès';
        } catch (PDOException $e) {
          $result1 = "Une erreur inattendue est survenue.";
        }
      } else {
        $result1 = "Cette adresse email est déjà utilisée par un autre utilisateur.";
      }
    } else {
      $result1 = "L'adresse email à modifier n'existe pas.";
    }

    return json_encode(['message' => $result1, 'modalTitle' => $modalTitle]);
  }


   /**
   * Checks if mail exists in database.
   * @param string $mail Mail to check
   * @return bool
   */
  private function passwordExistsInDb(string $password): bool
  {
    $checkpassword = $this->pdo->prepare("SELECT * FROM users WHERE password = :password");
    $checkpassword->bindParam(':password', $password);
    $checkpassword->execute();
    $rows = $checkpassword->fetchAll(PDO::FETCH_ASSOC);
    return count($rows) > 0;
  }


  /**
   * Updates mail in database.
   * @param string $mailToUpdate
   * @param string $newMail
   * @return void
   */
  private function updatepassword(string $passwordToUpdate, string $newpassword): void
  {
    $updatepassword = $this->pdo->prepare("UPDATE users SET password = :newpassword WHERE password = :currentpassword");
    $updatepassword->bindParam(':newpassword', $newpassword);
    $updatepassword->bindParam(':currentmail', $passwordToUpdate);

    $updatepassword->execute();
  }
 

  public function modifpassword()
  {
    $currentpassword = trim($_POST['currentpassword']);
    $newpassword = trim($_POST['newpassword']);
    $modalTitle = 'Erreur';

    if ($this->passwordExistsInDb($currentpassword)) {
      if (!$this->passwordExistsInDb($newpassword)) {

        try {
          $this->updatepassword($currentpassword, $newpassword);
          $result1 = "Le changement de mot de passe a été effectué avec succès.";
          $modalTitle = 'Succès';
        } catch (PDOException $e) {
          $result1 = "Une erreur inattendue est survenue.";
        }
      } else {
        $result1 = "Ce mot de passe est déjà utilisée par un autre utilisateur.";
      }
    } else {
      $result1 = "Le mot de passe à modifier n'existe pas.";
    }

    return json_encode(['message' => $result1, 'modalTitle' => $modalTitle]);
  }
}
