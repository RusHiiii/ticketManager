# Projet Symfony - Ticket Manager
Mariot Guillaume - Damiens Florent

# Présentation du projet
Réalisation d'un site en Symfony permettant la gestion de ticket

## Travail

Type | Temps |
- |:-: |
Cours | 20h |
Temps libre | 15h |

## Documentation :
* Analyse du projet: Use Case	
* Analyse de la base de données: MCD et MLD
	
## Procédure d'installation:
* [se placer dans /ticket_manager]
* ../composer.phar update
* Forcer la création du schema en BDD
* npm install
* ./node_modules/.bin/encore dev [build du style]
* php bin/console doctrine:fixtures:load
	
## Features
* CRUD Tickets
* CRUD Utilisateurs
* CRUD Application
* CRUD Clients
* CRUD Groupe
* CRUD Equipe
* + Statistiques supplémentaire (Evolution des tickets traités sur X semaines) 
* Filtrage des tickets 
	
# Note
<p>Les fixtures crées notre base de données avec un utilisateur admin/admin qui a le role le plus élevé. Si pour une quelconque raison les fixtures plante nous avons laissé volontairement un accès à la page localhost:8000/register pour pour ce créer un compte.</p>
<p>Par manque de temps la seul fonctionnalitée qui n'a pas pu etre réalisé est la gestion des pieces jointe à un ticket, cependant nous avons tout de même réalisé l'entité et le schema en base de données. Toutes les autres fonctionnalitées ont été réalisé, et le projet est tout de même fonctionnel sans cette derniere fonctionnalité.</p>
<p>L'utilisation de cette application necessite d'être loggé</p>


