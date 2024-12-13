-- --------------------------------------------------------
-- Structure de la table `sessions`
-- --------------------------------------------------------
CREATE TABLE `sessions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `libelle` VARCHAR(100) NOT NULL,
  `num` INT NOT NULL DEFAULT 0,
  `id_annee` INT NOT NULL,
  `fgactif` INT NOT NULL DEFAULT 0,
  `datedebut` DATETIME DEFAULT NULL,
  `datefin` DATETIME DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fg_traite` INT NOT NULL DEFAULT 0 COMMENT 'Marque que les dossiers de la session sont en traitement',
  `fg_complement` INT NOT NULL DEFAULT 0 COMMENT 'Marque que les dossiers de la session sont ouverts pour complément',
  `fg_resultat` INT NOT NULL DEFAULT 0 COMMENT 'Marque que les dossiers de la session sont disponibles pour traitement',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- Structure de la table `etudiants`
-- --------------------------------------------------------
CREATE TABLE `etudiants` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `code_foner` VARCHAR(20) NOT NULL UNIQUE,
  `nbaide` INT NOT NULL DEFAULT 0,
  `nbpret` INT NOT NULL DEFAULT 0,
  `telephone` VARCHAR(15) DEFAULT NULL,
  `nom` VARCHAR(100) DEFAULT NULL,
  `prenoms` VARCHAR(100) DEFAULT NULL, 
  `sexe` VARCHAR(10) DEFAULT NULL,
  `datenais` DATE DEFAULT NULL, 
  `numeropiece` VARCHAR(20) DEFAULT NULL,
  `email` VARCHAR(50) DEFAULT NULL, 
  `ine` VARCHAR(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- Structure de la table `allocation_sessions`
-- --------------------------------------------------------
CREATE TABLE `allocation_sessions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `fgactif` INT NOT NULL,
  `libelle` VARCHAR(100) NOT NULL,
  `id_nature_alloc` INT NOT NULL,
  `id_session` INT NOT NULL, -- clé étrangère référencant `sessions`
  `typealloc` VARCHAR(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_session`) REFERENCES `sessions`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------
-- Structure de la table `inscrits`
-- --------------------------------------------------------
CREATE TABLE `inscrits` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `etu_id` INT NOT NULL, -- clé étrangère référencant `etudiants`
  `id_alloc` INT NOT NULL, -- clé étrangère référencant `allocation_sessions`
  `nom` VARCHAR(60) NOT NULL,
  `prenom` VARCHAR(60) NOT NULL, 
  `telephone` VARCHAR(30) NOT NULL,
  `datenais` DATE NOT NULL, 
  `dateins` DATETIME NOT NULL,
  `code` VARCHAR(254) DEFAULT NULL,
  `code_foner` VARCHAR(100) DEFAULT NULL UNIQUE,
  `sexe` VARCHAR(1) NOT NULL, 
  `numeropiece` VARCHAR(20) DEFAULT NULL, 
  `email` VARCHAR(254) DEFAULT NULL,
  `numerocompte` VARCHAR(20) DEFAULT NULL,
  `fgvalid` INT DEFAULT 0,
  `code_ine` VARCHAR(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`etu_id`) REFERENCES `etudiants`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`id_alloc`) REFERENCES `allocation_sessions`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



