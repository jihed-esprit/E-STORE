<?php

include_once "../config.php";
	include_once "../model/fournisseur.php";


	class fournisseurC {

		function ajouterfournisseur( $login ,$mail  ,$password,$user,$token){
			$sql="INSERT INTO fournisseur (login ,mail  ,password,user,token) 
			VALUES (:login ,:mail  ,:password,:user ,:token )";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);

				$query->execute([

					 'login' =>$login,
					 'mail' =>$mail,
					 'password'=>$password,
					 'user'=>$user,
					 'token'=>$token
					 
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}

		 function afficherfournisseur(){

		$sql="SELECT * FROM fournisseur";
		$db = config::getConnexion();
		try{
			$liste = $db->query($sql);
			return $liste;
			}
		catch (Exception $e){
		die('Erreur: '.$e->getMessage());
			}	
		}


		 function supprimerfournisseur($id)  {
		 	try{
		 	$db=config::getConnexion();
		 	$query=$db->prepare('DELETE FROM fournisseur WHERE id= :id');
	 	$query->execute([
		 		'id'=>$id
		 	]);
		 	echo $query->rowCount() . "records DELETED successfully";
		 	 }catch(PDOException $e)
		 	  {$e->getMessage();}
		}
		 function modifierfournisseur($fournisseur,$id){
		 	try {
		 		$db = config::getConnexion();
		 		$query = $db->prepare(
		 			'UPDATE fournisseur SET 
		 		   
		 		    login= :login,
		 			  mail= :mail,
		 			 password= :password,
		 			 user= :user,
		 			WHERE id = :id'
				 );
			      $query->execute([	
					  
		 			'login'=>$fournisseur->getNom(),
		 			 'mail'=>$fournisseur->getmail(),
		 			'password'=>$fournisseur->getpassword(),
		 			'user'=>$fournisseur->getuser(),
					 'id'=> $id
		 		]);
		 		echo $query->rowCount() . " records UPDATED successfully <br>";
		 	} catch (PDOException $e) {
		 		$e->getMessage();
		 	}
		 }
	 function recupererfournisseur($id){
	 	$sql="SELECT * from fournisseur where id=$id";
	 	$db = config::getConnexion();
	 	try{
	 		$query=$db->prepare($sql);
				$query->execute();

	 		$fournisseur=$query->fetch();
	 		return $fournisseur;
	 	}
	 	catch (Exception $e){
	 		die('Erreur: '.$e->getMessage());
	 	}
	 }


	}
    ?>