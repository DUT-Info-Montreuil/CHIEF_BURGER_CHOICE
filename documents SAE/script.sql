--
-- Base de données : dutinfopw201653
--

-- --------------------------------------------------------

--
-- Structure de la table categorie
--

CREATE TABLE Categorie (
  id_categorie bigint(20) UNSIGNED NOT NULL,
  nom varchar(50),
  PRIMARY KEY(id_categorie)
);

-- --------------------------------------------------------

--
-- Structure de la table ingrédient
--

CREATE TABLE Ingredient (
  id_ingredient bigint(20) UNSIGNED NOT NULL,
  nom varchar(50),
  prix decimal,
  PRIMARY KEY(id_ingredient)
);

-- --------------------------------------------------------

--
-- Structure de la table utilisateur
--

CREATE TABLE Utilisateur (
  id_utilisateur bigint(20) UNSIGNED NOT NULL,
  nom varchar(50),
  email varchar(75) NOT NULL,
  mdp varchar(255) NOT NULL,
  cle int(11) NOT NULL,
  confirme int(11) NOT NULL,
  PRIMARY KEY(id_utilisateur)
);

-- --------------------------------------------------------

--
-- Structure de la table commande
--

CREATE TABLE Commande (
  id_commande bigint(20) UNSIGNED NOT NULL,
  date_commande datetime DEFAULT current_timestamp(),
  id_utilisateur bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY(id_commande),
  FOREIGN KEY(id_utilisateur) REFERENCES Utilisateur(id_utilisateur)
);

-- --------------------------------------------------------

--
-- Structure de la table boisson
--

CREATE TABLE Boisson (
  id_boisson bigint(20) UNSIGNED NOT NULL,
  nom varchar(50),
  prix decimal(19,4),
  format int(11) DEFAULT 33,
  PRIMARY KEY(id_boisson)
);

-- --------------------------------------------------------

--
-- Structure de la table burger
--

CREATE TABLE Burger (
  id_burger bigint(20) UNSIGNED NOT NULL,
  nom varchar(50),
  prix decimal(19,4),
  id_utilisateur bigint(20) UNSIGNED NOT NULL,
  image varchar(200) NOT NULL,   
  PRIMARY KEY(id_burger),
  FOREIGN KEY(id_utilisateur) REFERENCES Utilisateur(id_utilisateur)
);

-- --------------------------------------------------------

--
-- Structure de la table menu
--

CREATE TABLE Menu (
  id_menu bigint(20) UNSIGNED NOT NULL,
  nom varchar(50),
  prix decimal(19,4),
  id_boisson bigint(20) UNSIGNED NOT NULL,
  id_commande bigint(20) UNSIGNED NOT NULL,
  id_burger bigint(20) UNSIGNED NOT NULL,
  image varchar(200) NOT NULL,
  PRIMARY KEY (id_menu), 
  FOREIGN KEY(id_burger) REFERENCES Burger(id_burger),
  FOREIGN KEY(id_boisson) REFERENCES Boisson(id_boisson),
  FOREIGN KEY(id_commande) REFERENCES Commande(id_commande)
);

-- --------------------------------------------------------

--
-- Structure de la table avis
--

CREATE TABLE avis (
  id_burger bigint(20) UNSIGNED NOT NULL,
  id_utilisateur bigint(20) UNSIGNED NOT NULL,
  commentaire text,
  PRIMARY KEY(id_burger, id_utilisateur),
  FOREIGN KEY(id_burger) REFERENCES Burger(id_burger),
  FOREIGN KEY(id_utilisateur) REFERENCES Utilisateur(id_utilisateur)
);

-- --------------------------------------------------------

--
-- Structure de la table compose
--

CREATE TABLE compose (
  id_burger bigint(20) UNSIGNED NOT NULL,
  id_ingredient bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY(id_burger, id_ingredient),
  FOREIGN KEY(id_burger) REFERENCES Burger(id_burger),
  FOREIGN KEY(id_ingredient) REFERENCES Ingredient(id_ingredient)
);

-- --------------------------------------------------------

--
-- Structure de la table definitburger
--

CREATE TABLE definitburger (
  id_burger bigint(20) UNSIGNED NOT NULL,
  id_categorie bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY(id_burger, id_categorie),
  FOREIGN KEY(id_burger) REFERENCES Burger(id_burger),
  FOREIGN KEY(id_categorie) REFERENCES Categorie(id_categorie)
);

-- --------------------------------------------------------

--
-- Structure de la table definitingredient
--

CREATE TABLE definitingredient (
  id_ingredient bigint(20) UNSIGNED NOT NULL,
  id_categorie bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY(id_ingredient, id_categorie),
  FOREIGN KEY(id_ingredient) REFERENCES Ingredient(id_ingredient),
  FOREIGN KEY(id_categorie) REFERENCES Categorie(id_categorie)
);

-- --------------------------------------------------------

--
-- Structure de la table dislike
--

CREATE TABLE dislike (
  id_burger bigint(20) UNSIGNED NOT NULL,
  id_utilisateur bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY(id_burger, id_utilisateur),
  FOREIGN KEY(id_burger) REFERENCES Burger(id_burger),
  FOREIGN KEY(id_utilisateur) REFERENCES Utilisateur(id_utilisateur)  
);

-- --------------------------------------------------------

--
-- Structure de la table j_aime
--

CREATE TABLE j_aime (
  id_burger bigint(20) UNSIGNED NOT NULL,
  id_utilisateur bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY(id_burger, id_utilisateur),
  FOREIGN KEY(id_burger) REFERENCES Burger(id_burger),
  FOREIGN KEY(id_utilisateur) REFERENCES Utilisateur(id_utilisateur)  
);

-- --------------------------------------------------------

--
-- Structure de la table partage
--

CREATE TABLE partage (
  id_burger bigint(20) UNSIGNED NOT NULL,
  id_utilisateur bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY(id_burger, id_utilisateur),
  FOREIGN KEY(id_burger) REFERENCES Burger(id_burger),
  FOREIGN KEY(id_utilisateur) REFERENCES Utilisateur(id_utilisateur)  
);

-- --------------------------------------------------------

--
-- Structure de la table commentaire
--

CREATE TABLE commentaire (
  id int(11) NOT NULL,
  pseudo varchar(255) NOT NULL,
  commentaire text NOT NULL,
  id_burger bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(id_burger) REFERENCES Burger(id_burger)
);