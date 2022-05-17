-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Client :  devbdd.iutmetz.univ-lorraine.fr
-- Généré le :  Dim 08 Mai 2022 à 13:53
-- Version du serveur :  10.3.34-MariaDB
-- Version de PHP :  7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `fleisch2u_book_store`
--

-- --------------------------------------------------------

--
-- Structure de la table `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `id_author` int(10) unsigned NOT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `author`
--

INSERT INTO `author` (`id_author`, `surname`, `name`) VALUES
(1, 'King', 'Stephen'),
(2, 'Martin', 'Gail'),
(3, 'Heller', 'Joseph'),
(4, 'Herbert', 'Frank'),
(5, 'Howard', 'Robert'),
(6, 'Tolkien', 'J.R.R.'),
(7, 'Hill', 'Joe'),
(8, 'Billingham', 'Mark'),
(9, 'Lemaitre', 'Pierre'),
(10, 'Clarke', 'Arthur C.'),
(11, 'Baxter', 'Stephen'),
(12, 'Lovegrove', 'James'),
(13, 'Lovecraft', 'H.P.');

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id_book` int(10) unsigned NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `nb_pages` int(11) DEFAULT NULL,
  `nb_octets` int(11) DEFAULT NULL,
  `asin` varchar(45) DEFAULT NULL,
  `tome` int(11) DEFAULT NULL,
  `language` varchar(20) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `id_category` int(5) NOT NULL,
  `id_editor` int(10) NOT NULL,
  `id_author` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `book`
--

INSERT INTO `book` (`id_book`, `title`, `description`, `nb_pages`, `nb_octets`, `asin`, `tome`, `language`, `url`, `id_category`, `id_editor`, `id_author`) VALUES
(1, 'Bazaar', 'King où l''art d''enraciner dans des faits les plus insignifiants de la vie quotidienne le suspense et l''horreur', 791, 1201, 'B005OQDHHS', NULL, 'français', NULL, 2, 1, 1),
(2, 'L''élue de la Dame Noire - Les chroniques du Nécromancien', 'Vengeance, magie et mystères de l''au-delà... Après un an d''exil, Martris Drayke regagne enfin le trône de Margolan. Le roi Invocateur espère rétablir la paix dans le royaume. Mais la couronne est menacée par les sbires de son défunt frère.', 437, 1386, 'B0157260TA', 4, 'français', NULL, 1, 2, 2),
(3, 'Catch-22', 'Set in the closing months of World War II in an American bomber squadron off the coast of Italy, Catch-22 is the story of a bombardier named Yossarian who is frantic and furious because thousands of people he has never even met keep trying to kill him.', 519, 2897, 'B0050OMJIW', NULL, 'english', NULL, 3, 3, 3),
(4, 'Dune tome 1', 'Il n''y a pas, dans tout l''Empire, de planète plus inhospitalière que Dune. Partout des sables à perte de vue. Une seule richesse : l''épice de longue vie, née du désert, et que tout l''univers convoite.\r\nQuand Leto Atréides reçoit Dune en fief, il flaire le piège. Il aura besoin des guerriers Fremen qui, réfugiés au fond du désert, se sont adaptés à une vie très dure en préservant leur liberté, leurs coutumes et leur foi. Ils rêvent du prophète qui proclamera la guerre sainte et changera le cours de l''histoire.\r\nCependant, les Révérendes Mères du Bene Gesserit poursuivent leur programme millénaire de sélection génétique : elles veulent créer un homme qui réunira tous les dons latents de l''espèce. Le Messie des Fremen est-il déjà né dans l''Empire ?', 838, 2012, 'B08HQ1HMF3', 1, 'français', NULL, 1, 4, 4),
(5, 'Kull le roi atlante', 'C’est avec ce cycle que Robert E. Howard a pose les bases de la forme moderne de la Fantasy. Barbare et roi, guerrier tourmente, trahi et rejete par les siens, Kull est un personnage complexe, l’une des creations les plus fascinantes de l’auteur qui nous a donne Conan le Cimmerien. Cette edition integrale a été concue et dirigee par Patrice Louinet, l’un des plus grands specialistes au monde de l’œuvre de Howard.', 432, 1031, 'B00CEFD2D6', NULL, 'français', NULL, 1, 2, 5),
(6, 'The Silmarillion', 'The Silmarillion is an account of the Elder Days, of the First Age of Tolkien’s world. It is the ancient drama to which the characters in The Lord of the Rings look back, and in whose events some of them such as Elrond and Galadriel took part. The tales of The Silmarillion are set in an age when Morgoth, the first Dark Lord, dwelt in Middle-Earth, and the High Elves made war upon him for the recovery of the Silmarils, the jewels containing the pure light of Valinor.\r\n\r\nIncluded in the book are several shorter works. The Ainulindale is a myth of the Creation and in the Valaquenta the nature and powers of each of the gods is described. The Akallabeth recounts the downfall of the great island kingdom of Númenor at the end of the Second Age and Of the Rings of Power tells of the great events at the end of the Third Age, as narrated in The Lord of the Rings.', 481, 2151, 'B004L9MFAY', NULL, 'english', NULL, 1, 5, 6),
(7, 'NOSFERA2', 'Il suffit que Victoria monte sur son vélo et passe sur le vieux pont derrière chez elle pour ressortir là où elle le souhaite. Elle sait que personne ne la croira. Elle-même n’est pas vraiment sûre de comprendre ce qui lui arrive.\r\nCharles possède lui aussi un don particulier. Il aime emmener des enfants dans sa Rolls-Royce de 1938. Un véhicule immatriculé NOSFERA2. Grâce à cette voiture, Charles et ses innocentes victimes échappent à la réalité et parcourent les routes cachées qui mènent à un étonnant parc d’attractions appelé Christmasland, où l’on fête Noël tous les jours ; la tristesse hors la loi mais à quel prix…\r\nVictoria et Charles vont finir par se confronter. Les mondes dans lesquels ils s’affrontent sont peuplés d’images qui semblent sortir de nos plus terribles cauchemars.\r\n', 593, 7231, 'B00HESVR3K', NULL, 'français', NULL, 2, 6, 7),
(8, 'Sleepyhead', 'It''s rare for a young woman to die from a stroke and when three such deaths occur in short order it starts to look like an epidemic. Then a sharp pathologist notices traces of benzodiazepine in one of the victim''s blood samples and just traceable damage to the ligaments in her neck, and their cause of death is changed from ''natural'' to murder.The police aren''t making much progress in their hunt for the killer until he appears to make a mistake: Alison Willetts is found alive and D.I. Tom Thorne believes the murderer has made a mistake, which ought to allow them to get on his tracks. But it was the others who were his mistakes: he doesn''t want to take life, he just wants to put people into a state where they cannot move, cannot talk, cannot do anything but think.When Thorne, helped by the neurologist looking after Alison, starts to realise what he is up against he knows the case is not going to be solved by normal methods - before he can find out who did it he has to understand why he''s doing it.', 436, 4963, 'B002TXZRO0', NULL, 'english', NULL, 4, 7, 8),
(9, 'Au revoir là-haut', 'Sur les ruines du plus grand carnage du XXe siècle, deux rescapés des tranchées, passablement abîmés, prennent leur revanche en réalisant une escroquerie aussi spectaculaire qu''amorale. Des sentiers de la gloire à la subversion de la patrie victorieuse, ils vont découvrir que la France ne plaisante pas avec ses morts...\r\nFresque d''une rare cruauté, remarquable par son architecture et sa puissance d''évocation, Au revoir là-haut est le grand roman de l''après-guerre de 14, de l''illusion de l''armistice, de l''État qui glorifie ses disparus et se débarrasse de vivants trop encombrants, de l''abomination érigée en vertu.\r\nDans l''atmosphère crépusculaire des lendemains qui déchantent, peuplée de misérables pantins et de lâches reçus en héros, Pierre Lemaitre compose la grande tragédie de cette génération perdue avec un talent et une maîtrise impressionnants.', 509, 1763, 'B00E5AD4Z4', NULL, 'français', NULL, 3, 1, 9),
(10, 'Sherlock Holmes et les monstruosités du Miskatonic: Les Dossiers Cthulhu T2', 'Printemps 1895. Malgré quinze années de combat contre des entités surnaturelles, quinze années qui ont coûté sa santé à Sherlock Holmes mais aussi la vie à Mary, épouse du Dr. Watson, les deux amis accourent sans hésiter lorsqu’on les appelle à Bedlam, asile psychiatrique de triste renommée. Ils y rencontrent un étrange patient qui parle r’lyehen, la langue des Grands Anciens. L’homme, amnésique, est horriblement mutilé.\r\n\r\nLes détectives découvrent qu’il s’agit d’un scientifique ayant étudié à l’Université Miskatonic, et l’un des deux survivants d’une expédition maudite visant à capturer un Shoggoth, une créature quasi-mythique. Mais comment cet homme a-t-il atterri à Londres, et pourquoi a-t-il perdu l’esprit ? Lorsque le mystérieux patient disparaît, enlevé par des forces occultes, il devient évident que l’affaire ne se limite pas à son cas. C’est seulement en apprenant ce qui s’est réellement passé lors de cette désastreuse expédition en Nouvelle-Angleterre que Holmes et Watson pourront mettre au jour la vérité, et qui se cache derrière la monstruosité du Miskatonic...', 432, 4069, 'B07L5SMRJ2', 2, 'français', NULL, 1, 2, 12),
(11, 'L''Appel de Cthulhu', 'Nouvelle fantastique de l''écrivain américain Howard Phillips Lovecraft, publiée en février 1928 dans le magazine Weird Tales. C''est l’œuvre fondatrice du mythe de Cthulhu : un panthéon de dieux et d’êtres monstrueux venus du cosmos et de la nuit des temps ressurgissent pour reprendre possession de notre monde. Ceux qui en sont témoins sont voués à la folie et à la destruction.', 47, 516, 'B015YQOD66', NULL, 'français', NULL, 2, 2, 13);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(5) unsigned NOT NULL,
  `label` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id_category`, `label`) VALUES
(1, 'Fantasy'),
(2, 'Horreur'),
(3, 'Guerre'),
(4, 'Thriller'),
(5, 'Sci-Fi');

-- --------------------------------------------------------

--
-- Structure de la table `download`
--

CREATE TABLE IF NOT EXISTS `download` (
  `id_user` int(10) NOT NULL,
  `id_book` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `download`
--

INSERT INTO `download` (`id_user`, `id_book`) VALUES
(1, 2),
(1, 3),
(1, 4),
(2, 3),
(2, 1),
(3, 9);

-- --------------------------------------------------------

--
-- Structure de la table `editor`
--

CREATE TABLE IF NOT EXISTS `editor` (
  `id_editor` int(10) unsigned NOT NULL,
  `label` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `editor`
--

INSERT INTO `editor` (`id_editor`, `label`) VALUES
(1, 'Albin Michel'),
(2, 'Bragelonne'),
(3, 'Vintage Digital'),
(4, 'Robert Lafont'),
(5, 'HarperCollins'),
(6, 'JC Lattès'),
(7, 'Sphere');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(10) unsigned NOT NULL,
  `pseudo` varchar(45) DEFAULT NULL,
  `mail` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `is_admin` boolean DEFAULT FALSE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `pseudo`, `mail`, `password`, `is_admin`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$K28V9o9zlRWOrmR//dkvyOIJMrPK.j86HJ3brGpGfF.LXSgNLTdJ6', true),
(2, 'Fahim', 'fahim@fahim.com', '$2y$10$P5DbAMS3xYpNREqddjSCgeDULU9gNnyzfktj2YeqNYu17FDayzk.i', false),
(3, 'Silene', 'silene@silene.com', '$2y$10$wl3bm8aODZ2oLWOxOGBpt.v.u.RNvlTdD1f1yamKYpPxEOgTsbg8C', false),
(4, 'Siham', 'siham@siham.com', '$2y$10$K5bGrUovQ87xhymMyrHUnOh6IS.D0GjfE.d3PYw3yJW6KjoDsu6uy', false),
(5, 'Gabriel', 'gabi@gabi.com', '$2y$10$eWcIct2.Z5bLlcyLPx9k/exk0AauTmQSw6v.6UjF/2Mi6bVYBprJG', false),
(6, 'Clarisse', 'clarisse@clarisse.com', '$2y$10$6C5i1jdtl0O2kIb3cfaoJOR7lR.Qe9Aj7JehFEgC9ng8i2Xn/yq72', false),
(7, 'Lucas', 'lucas@lucas.com', '$2y$10$UI0DURTzbnfYK9Xf/2VZXuPfYVFdnyZLfn0dA0NQPKHLcwlhlJiZy', false),
(8, 'Sephir', 'sephir@sephir.com', '$2y$10$m05ILLYunO5SEwg7w5JO/OWbf1Nqqje8/DM/WkD5.lOfiVAAbKFG2', false);


--
-- Index pour les tables exportées
--

--
-- Index pour la table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id_author`);

--
-- Index pour la table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id_book`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_editor` (`id_editor`),
  ADD KEY `id_author` (`id_author`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Index pour la table `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`id_user`,`id_book`),
  ADD KEY `id_book` (`id_book`);

--
-- Index pour la table `editor`
--
ALTER TABLE `editor`
  ADD PRIMARY KEY (`id_editor`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `author`
--
ALTER TABLE `author`
  MODIFY `id_author` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `book`
--
ALTER TABLE `book`
  MODIFY `id_book` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `editor`
--
ALTER TABLE `editor`
  MODIFY `id_editor` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
