# ToDo_APP

Gestionnaire de Tâches en PHP

## 📌 Description

Ce projet est une application web simple de **gestion de tâches** développée en **PHP (PDO)** avec **MySQL**.  
Elle permet aux utilisateurs de créer un compte, se connecter et gérer leurs tâches personnelles :

- Ajouter
- Supprimer
- Modifier le statut
- Lister toutes les tâches

L'application inclut des **mesures de sécurité** :

- Protection contre l'injection SQL (requêtes préparées)
- Hashage des mots de passe (`password_hash` / `password_verify`)
- Vérification des sessions

---

## 📂 Structure du projet

Dossier assets contient les fichier css et js ✅ <br>
Dossier config contient les fichers de connection a la base de données :<br>
db : la classe qui permet de se connecter à la base de données ✅<br>
task : la classe pour les tache qui a toute les requetes(ajouter, modifier, lister, supprimer)✅<br>
user : la classe pour les utilisateurs qui a toute les requetes(ajouter, lister)✅<br>
Dossier includes pour le footer(bas de page) et le header (tete de page)✅<br>
add.php :pour ajouter une tache ✅<br>
dasbord.php :tableau de bord d'un utilidateur(lister les tache)✅<br>
delete.php :pour supprimer une tache ✅<br>
login.php :pour se connecter ✅<br>
logout.php :pour se deconnecter ✅<br>
mark_task.php :pour modifier le statut d'une tache (faite ou pas faite)✅<br>
register.php :pour s'inscrire ✅<br>
