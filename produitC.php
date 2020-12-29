<?php
    require_once '../config.php';
    class produitC {
       public function afficherProduit() {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM produit'
                );
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
       /* public function supprimerProduit($idP) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'DELETE  FROM produit WHERE idP = :idP'
                );
                $query->execute([
                    'idP' => $idP
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }*/
        function supprimerProduit($id)  {
            try{
            $pdo=getConnexion();
            $query=$pdo->prepare('DELETE FROM commentaires WHERE id= :id');
        $query->execute([
                'id'=>$id
            ]);
            echo $query->rowCount() . "records DELETED successfully";
             }catch(PDOException $e)
              {$e->getMessage();}
       }

        public function afficherProduitById($idP) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM produit WHERE idP = :idP'
                );
                $query->execute([
                    'idP' => $idP
                ]);
                return $query->fetchall();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

      /*  public function getAlbumByTitle($title) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM album WHERE titre = :title'
                );
                $query->execute([
                    'title' => $title
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function addAlbum($album) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'INSERT INTO album (titre, prix, image, genre) 
                VALUES (:titre, :prix, :image, 1)'
                );
                $query->execute([
                    'titre' => $album->getTitre(),
                    'prix' => $album->getPrix(),
                    'image' => $album->getImage()
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function updateAlbum($album, $id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'UPDATE album SET titre = :titre, prix = :prix, image = :image WHERE idAlbum = :id'
                );
                $query->execute([
                    'titre' => $album->getTitre(),
                    'prix' => $album->getPrix(),
                    'image' => $album->getImage(),
                    'id' => $id
                ]);
                echo $query->rowCount() . " records UPDATED successfully";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        

        public function rechercherAlbum($title) {            
            $sql = "SELECT * from album where titre=:title"; 
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
                $query->execute([
                    'titre' => $album->getTitre(),
                ]); 
                $result = $query->fetchAll(); 
                return $result;
            }
            catch (PDOException $e) {
                $e->getMessage();
            }
        }
        */
    }