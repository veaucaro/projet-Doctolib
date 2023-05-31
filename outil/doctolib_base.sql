-- =================================================================
-- Base DOCTOLIB version 3
-- Marc LEMERCIER, le 2 mai 2023
-- =================================================================

-- table specialités

create table if not exists specialite (
  id integer unsigned not null, 
  label varchar(40) not null,
  primary key (id)
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;

insert into specialite values (0, "je ne suis pas un praticien");
insert into specialite values (1, "médecin généraliste");
insert into specialite values (2, "infirmier");
insert into specialite values (3, "dentiste");
insert into specialite values (4, "sage-femme");
insert into specialite values (5, "ostéopathe");
insert into specialite values (6, "kinésithérapeute");

-- table personne

create table if not exists personne (
 id integer unsigned not null,
 nom varchar(40) not null,
 prenom varchar(40) not null,
 adresse varchar(40) not null, 
 login varchar(20) not null,
 password varchar(20) not null,
 statut integer unsigned not null,
 specialite_id integer unsigned not null,   
 primary key (id), 
 foreign key (specialite_id) references specialite(id)
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;

-- table administrateur

insert into personne values (10, "GAILLARD", "Paul", "Troyes", "boss1", "secret", 0, 1);
insert into personne values (20, "LERMINIAUX", "Christian", "Troyes", "boss2", "secret", 0, 1);
insert into personne values (30, "KOCH", "Pierre", "Troyes", "boss3", "secret", 0, 1);
insert into personne values (40, "COLLET", "Christophe", "Troyes", "boss4", "secret", 0, 1);


-- table praticien

insert into personne values (50, "PASTEUR", "Louis", "Paris", "pasteur", "secret", 1, 1);
insert into personne values (60, "PARE", "Ambroise", "Rennes", "pare", "secret", 1, 1);
insert into personne values (70, "LAENNEC", "René", "Nantes", "laennec", "secret", 1, 1);
insert into personne values (80, "CALMETTE", "Albert", "Lille", "calmette", "secret", 1, 1);
insert into personne values (90, "ROUX", "Emile", "Paris", "roux", "secret", 1, 1);

insert into personne values (100, "PRIOR", "Beatrice", "Troyes", "prior", "secret", 1, 2);
insert into personne values (110, "EATON", "Tobias", "Reims", "tobias", "secret", 1, 5);
insert into personne values (120, "MATTHEWS", "Jeanine", "Dijon", "matthews", "secret", 1, 3);


-- table patient

-- patient ZERO pour les RDV disponibles
insert into personne values (0, "?", "?", "?", "?", "?", 2, 0);
insert into personne values (201, "VENTURA", "Lino", "Paris", "ventura", "secret", 2, 0);
insert into personne values (202, "DELON", "Alain", "Paris", "delon", "secret", 2, 0);
insert into personne values (203, "GABIN", "Jean", "Paris", "gabin", "secret", 2, 0);
insert into personne values (204, "HUPPERT", "Isabelle", "Troyes", "huppert", "secret", 2, 0);
insert into personne values (205, "COTILLARD", "Marion", "Troyes", "cotillard", "secret", 2, 0);
insert into personne values (206, "DEPP", "Lily Rose", "Troyes", "depp", "secret", 2, 0);

-- table rdv

create table if not exists rendezvous (
 id integer unsigned not null,
 patient_id integer unsigned not null, 
 praticien_id integer unsigned not null,
 rdv_date varchar(20),
 primary key (id), 
 foreign key (patient_id) references personne(id), 
 foreign key (praticien_id) references personne(id)
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;

INSERT INTO `rendezvous` (`id`, `patient_id`, `praticien_id`, `rdv_date`) VALUES
(1, 201, 50, '2023-05-22 à 10h00'),
(2, 202, 50, '2023-05-22 à 11h00'),
(3, 203, 50, '2023-05-22 à 12h00'),
(4, 0, 50, '2023-05-22 à 13h00'),
(5, 0, 50, '2023-05-22 à 14h00'),
(6, 0, 50, '2023-05-22 à 15h00'),
(7, 0, 50, '2023-05-22 à 16h00'),
(8, 0, 50, '2023-05-22 à 17h00'),
(9, 0, 50, '2023-05-22 à 18h00'),
(10, 0, 50, '2023-05-22 à 19h00'),
(11, 201, 60, '2023-05-25 à 10h00'),
(12, 0, 60, '2023-05-25 à 11h00'),
(13, 0, 60, '2023-05-25 à 12h00'),
(14, 0, 60, '2023-05-25 à 13h00'),
(15, 0, 60, '2023-05-25 à 14h00'),
(16, 0, 60, '2023-05-25 à 15h00'),
(17, 0, 60, '2023-05-25 à 16h00'),
(18, 205, 60, '2023-05-25 à 17h00'),
(19, 0, 70, '2023-05-30 à 10h00'),
(20, 0, 70, '2023-05-30 à 11h00'),
(21, 0, 70, '2023-05-30 à 12h00'),
(22, 0, 70, '2023-05-30 à 13h00'),
(23, 0, 70, '2023-05-30 à 14h00'),
(24, 201, 70, '2023-05-30 à 15h00'),
(25, 0, 70, '2023-05-30 à 16h00'),
(26, 0, 70, '2023-05-30 à 17h00'),
(27, 0, 70, '2023-05-30 à 18h00'),
(28, 0, 70, '2023-05-30 à 19h00'),
(29, 0, 70, '2023-05-30 à 20h00'),
(30, 0, 70, '2023-05-30 à 21h00'),
(31, 0, 80, '2023-05-20 à 10h00'),
(32, 0, 80, '2023-05-20 à 11h00'),
(33, 206, 80, '2023-05-20 à 12h00'),
(34, 202, 80, '2023-05-20 à 13h00'),
(35, 203, 80, '2023-05-20 à 14h00'),
(36, 0, 90, '2023-06-01 à 10h00'),
(37, 0, 90, '2023-06-01 à 11h00'),
(38, 0, 90, '2023-06-01 à 12h00'),
(39, 0, 90, '2023-06-01 à 13h00'),
(40, 0, 90, '2023-06-01 à 14h00'),
(41, 204, 90, '2023-06-01 à 15h00'),
(42, 0, 90, '2023-06-01 à 16h00'),
(43, 0, 90, '2023-06-01 à 17h00');
