-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Client :  devbdd.iutmetz.univ-lorraine.fr
-- Généré le :  Mar 17 Mai 2022 à 20:21
-- Version du serveur :  10.3.34-MariaDB
-- Version de PHP :  7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `fleisch2u_bookstore`
--

-- --------------------------------------------------------

--
-- Structure de la table `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `id_author` int(10) unsigned NOT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

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
(13, 'Lovecraft', 'H.P.'),
(14, 'Gemmell', 'David'),
(15, 'Druon', 'Maurice'),
(16, 'Russo', 'Richard Paul'),
(17, 'Smith', 'Tom Rob'),
(18, 'Gaiman', 'Neil');

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

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
(11, 'L''Appel de Cthulhu', 'Nouvelle fantastique de l''écrivain américain Howard Phillips Lovecraft, publiée en février 1928 dans le magazine Weird Tales. C''est l’œuvre fondatrice du mythe de Cthulhu : un panthéon de dieux et d’êtres monstrueux venus du cosmos et de la nuit des temps ressurgissent pour reprendre possession de notre monde. Ceux qui en sont témoins sont voués à la folie et à la destruction.', 47, 516, 'B015YQOD66', NULL, 'français', NULL, 2, 2, 13),
(12, 'Druss la Légende', 'Son nom est Druss. Bûcheron hargneux le jour, époux tendre le soir, il mène une existence paisible au milieu des bois. Mais un jour une troupe de mercenaires envahit son village pour tuer les hommes et capturer les femmes. Druss arrive trop tard sur les lieux du massacre. Son père gît dans une mare de sang et Rowena, sa femme, a disparu... S''armant de Snaga, une hache ayant appartenu à son grand-père, il se lance à la poursuite des ravisseurs. La route sera longue pour ce jeune homme inexpérimenté et sa quête le mènera jusqu''au bout du monde. Il deviendra lutteur et mercenaire, il fera tomber des royaumes, il en élèvera d''autres, il combattra bêtes, hommes et démons. Car son nom est Druss, et voici sa légende...', 485, 833, 'B005PQZE0K', NULL, 'français', NULL, 1, 2, 14),
(13, 'Les Mémoires de Zeus', 'À ceux qui pensent que vivre pour un dieu est aisé, je dis : «Détrompez-vous.»  Aux mortels qui croient que notre vie n’est que volupté et délices, je dis: «Apprenez de votre erreur.»  Ayant échappé à l’infanticide, j’ai grandi seul, caché sur une île. Je suis devenu homme et guidé par ma grand-mère Gaïa, j’ai concocté un plan afin de renverser mon père, Cronos, maître de l’Olympe. Seul, j’ai appris la vie, l’amour, la mort et la colère. J’ai levé une armée, j’ai réveillé les géants, j’ai libéré mes frères et mes sœurs. J’ai accompli mon destin!  Moi, Zeus, roi des dieux, dieu des rois, je vais vous conter mon histoire...', 419, 1141, 'B00MAEWB3I', NULL, 'français', NULL, 1, 2, 15),
(14, 'La Nef des fous', 'L''Argonos est un monstre de métal. Un vaisseau démesuré qui nourrit en son sein des milliers d''êtres humains depuis des générations. Nul ne sait plus dans quel but, nul ne sait plus pour quelle destination. L''Argonos erre d''étoile en étoile, mais pour y trouver quoi ? Bartolomeo Aguilera est un monstre de chair. Contrefait, sans bras, enferré dans un exosquelette, mais doté d''une intelligence hors du commun. Conseiller du capitaine Nikos Costa, il sera ses yeux au sein de l''équipe d''exploration d''Antioche, une planète depuis laquelle l''Argonos a capté une transmission probablement humaine. Une colonie ? Sans doute. Mais aussi un carnage, des centaines de corps pendus à des crochets comme de vulgaires morceaux de viande.Que s''est-il passé sur Antioche ? Pourquoi une telle atrocité ? Et surtout, commise par qui ?', 446, 1283, 'B00E5ZXDVE', NULL, 'français', NULL, 5, 8, 16),
(15, 'The Secret Speech', 'Soviet Union, 1956: Stalin is dead. With his passing, a violent regime is beginning to fracture - leaving behind a society where the police are the criminals, and the criminals are innocent. The catalyst comes when a secret manifesto composed by Stalin''s successor Khrushchev is distributed to the entire nation. Its message: Stalin was a tyrant and a murderer. Its promise: The Soviet Union will transform. But there are forces at work that are unable to forgive or forget Stalin''s tyranny so easily, that demand revenge of the most appalling nature.  Meanwhile, former MGB officer Leo Demidov is facing his own turmoil. The two young girls he and his wife Raisa adopted have yet to forgive him for his involvement in the murder of their parents. They are not alone. Now that the truth is out, Leo, Raisa and their family are in grave danger from someone with a grudge against Leo. Someone transformed beyond recognition into the perfect model of vengeance.|', 428, 498, 'B008RPB4SM', NULL, 'english', NULL, 4, 9, 17),
(16, 'L''Œil du Temps: L''Odyssée du Temps tome 1', 'En un instant, une force inconnue a morcelé la Terre en une mosaïque d''époques, de la préhistoire à l''an 2037. Un gigantesque puzzle qui résume l''évolution de l''espèce humaine. Depuis, des sphères argentées planent sur toute la planète, invulnérables et silencieuses. Ces objets mystérieux, issus d''une technologie prodigieuse, sont-ils à l''origine de ces bouleversements ? La réponse se trouve peut-être dans l''antique cité de Babylone, dont proviennent des signaux radios... Une poignée de cosmonautes et de casques bleus sont jetés dans cette situation incroyable, les uns dans l''armée d''Alexandre le Grand, les autres aux côtés des hordes de Gengis Khan ! Tous convergent vers Babylone, déterminés à connaître son secret... et accaparer le pouvoir qu''elle recèle. Mais une puissance mystérieuse observe les deux armées, attendant l''issue de la bataille...', 381, 1472, 'B005PQZD4M', 1, 'français', NULL, 5, 2, 10),
(17, 'La Cité et les Astres', 'Selon la légende, les hommes auraient jadis conquis les étoiles.\r\nJadis, d''immenses villes auraient fleuri à la surface de la Terre.\r\nPuis les Envahisseurs sont venus, laissant l''Humanité exsangue, confinée sur sa planète natale.\r\nPendant des millénaires, la cité de Diaspar a servi de refuge aux rares rescapés. Une prison dorée, close sur elle-même, sagement gérée par un ordinateur omnipotent. Dix millions d''habitants y naissent et y renaissent artificiellement, sans jamais vraiment mourir...\r\nJusqu''à l''apparition d''un être unique, Alvin, qui refuse cette existence pétrifiée et sans but. Bravant les lois de Diaspar, il va entamer un fantastique voyage parmi les mondes morts, qui le mènera aux confins de la galaxie.', 347, 822, 'B00DGSA670', NULL, 'français', NULL, 5, 10, 10),
(18, 'American Gods', 'Locked behind bars for three years, Shadow did his time, quietly waiting for the magic day when he could return to Eagle Point, Indiana. A man no longer scared of what tomorrow might bring, all he wanted was to be with Laura, the wife he deeply loved, and start a new life. \r\n\r\nBut just days before his release, Laura and Shadow’s best friend are killed in an accident. With his life in pieces and nothing to keep him tethered, Shadow accepts a job from a beguiling stranger he meets on the way home, an enigmatic man who calls himself Mr. Wednesday. A trickster and a rogue, Wednesday seems to know more about Shadow than Shadow does himself. ', 560, 89000, 'B004TTHLBE', NULL, 'english', NULL, 1, 5, 18),
(19, 'Les Vaisseaux du temps (Ailleurs et Demain)', 'La machine à explorer le temps est le texte fondateur de la science-fiction moderne. Lorsque s''achève le récit de H. G. Wells, le Voyageur se prépare à repartir dans le futur sauver Weena, la charmante Eloï, menacée par les cruels Morlocks...\r\nPar une chance extraordinaire, la narration de ce second voyage est parvenue à Stephen Baxter, un siècle exactement après la parution, en 1895, deLa machine à explorer le temps.\r\nEn voici la fidèle et surprenante transcription.\r\nIl n''est pas nécessaire pour le goûter d''avoir lu le récit du premier voyage.\r\nReparti dans un lointain avenir, le Voyageur surpris découvre un monde différent de celui qu''il avait exploré, où les Morlocks disposent d''une civilisation technologique avancée et ne ressemblent plus aux barbares qu''il a connus.\r\nFlanqué du Morlock Nebogipfel, il s''aventurera sur les Vaisseaux du temps jusqu''aux confins du temps et de l''espace, des univers parallèles et des possibles.\r\nSans jamais perdre l''espoir de retrouver la délicieuse Weena.', 500, 4816, 'B00IGKADDK', NULL, 'français', NULL, 5, 4, 11),
(20, 'L''homme-feu', 'Personne ne sait exactement quand et où cela a commencé.\r\nSur le corps des hommes et des femmes de magnifiques tatouages apparaissent et brûlent plus ou moins violemment les individus qui les portent… Boston, Détroit, Seattle… sont frappés. Il n’existe pas d’antidote.\r\nHarper est une infirmière merveilleusement bienveillante. Le même jour, elle découvre qu’elle est enceinte et qu’elle est touchée par le virus. Paniqué son mari fuit.\r\nEt dans ce monde en ruines où des micros sociétés se créent et des milices d’exterminations traquent les malades, Harper va rencontrer l’Homme-feu capable de contrôler le feu intérieur qui consume les humains. Ensemble, ils vont tenter de sauver une société terrorisée où chacun est prêt au pire pour tenter de survivre.\r\nUne fresque aussi profonde que fascinante sur l’homme face à ses peurs vertigineuses et à sa puissance de vie.', 601, 1494, 'B072BH33CK', NULL, 'français', NULL, 2, 6, 7),
(21, 'Lazybones', 'It''s only ten days since Douglas Remfry''s release from prison, having served seven years for rape, and now he''s dead: naked on a bare mattress in a grubby north London hotel room, his head hooded and his hands tied with a brown leather belt.\r\n\r\nSomeone knew he was coming out. Someone wanted to mete out some punishment of his own.\r\n\r\nAnd when a second sex offender is found dead, DI Tom Thorne knows he has a vicious, calculating vigilante on his hands...\r\n', 481, 3514, 'B002TXZRNG', NULL, 'english', NULL, 4, 7, 8),
(22, 'ça tome 1', 'Tout avait commencé juste avant les vacances d''été quand le petit Browers avait gravé ses initiales au couteau sur le ventre de son copain Ben Hascom.\r\n\r\nTout s''était terminé deux mois plus tard dans les égouts par la poursuite infernale d''une créature étrange, incarnation même du mal.\r\n\r\nMais aujourd''hui tout recommence. Les enfants terrorisés sont devenus des adultes. Le présent retrouve le passé, le destin reprend ses droits, l''horreur ressurgit.\r\n\r\nChacun retrouvera dans ce roman à la construction saisissante ses propres souvenirs, ses angoisses et ses terreurs d''enfant, la peur de grandir dans un monde de violence.', 833, 3137, 'B005OQDDSQ', 1, 'français', NULL, 2, 1, 1),
(23, 'The Mist', 'Following a freak summer storm, David Drayton, his son Billy, and their neighbour Brent Norton join dozens of others and head to the local grocery store to replenish supplies.\r\n\r\nOnce there, they become trapped by a strange mist that has enveloped the town. Violent forces concealed in the mist are starting to emerge. And there is another shocking threat from within - one group of survivors, led by a religious zealot, is calling for a sacrifice.\r\n\r\nNow David and his son must try to escape. But what''s outside may be even more dangerous.\r\n\r\nThis exhilarating novella explores the horror in both the enemy you know - and the one you can only imagine.', 179, 4265, 'B09B1VXB94', NULL, 'english', NULL, 2, 3, 1),
(24, 'Havre Sombre: Chroniques du Nécromancien', 'Le royaume de Margolan est en ruines. Martris Drayke, le nouveau roi, doit reconstruire son pays après la bataille, alors qu’une nouvelle guerre s’annonce. De son côté, Jonmarc Vahanian, à présent seigneur du Havre Sombre, est aux prises avec les vayash moru qui remettent en cause son autorité: il n’est qu’un mortel. Comment gagner leur confiance, et à quel prix ?\r\n\r\nLes Chroniques du Nécromancien, dont voici le troisième tome, est une série captivante où se mêlent la mort et la vengeance, la magie et les mystères de l’au-delà.\r\n', 435, 1367, 'B00M88B28Q', 3, 'français', NULL, 1, 2, 2),
(25, 'The Lord of the Rings', 'Sauron, the Dark Lord, has gathered to him all the Rings of Power – the means by which he intends to rule Middle-earth. All he lacks in his plans for dominion is the One Ring – the ring that rules them all – which has fallen into the hands of the hobbit, Bilbo Baggins.\r\n\r\nIn a sleepy village in the Shire, young Frodo Baggins finds himself faced with an immense task, as the Ring is entrusted to his care. He must leave his home and make a perilous journey across the realms of Middle-earth to the Crack of Doom, deep inside the territories of the Dark Lord. There he must destroy the Ring forever and foil the Dark Lord in his evil purpose.\r\n\r\nSince it was first published in 1954, ‘The Lord of the Rings’ has been a book people have treasured. Steeped in unrivalled magic and otherworldliness, its sweeping fantasy has touched the hearts of young and old alike.', 1209, 23664, 'B093KH5GSS', NULL, 'english', NULL, 1, 5, 6);

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
(2, 1),
(2, 3),
(3, 9);

-- --------------------------------------------------------

--
-- Structure de la table `editor`
--

CREATE TABLE IF NOT EXISTS `editor` (
  `id_editor` int(10) unsigned NOT NULL,
  `label` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `editor`
--

INSERT INTO `editor` (`id_editor`, `label`) VALUES
(1, 'Albin Michel'),
(2, 'Bragelonne'),
(3, 'Hodder & Stoughton'),
(4, 'Robert Lafont'),
(5, 'HarperCollins'),
(6, 'JC Lattès'),
(7, 'Sphere'),
(8, 'Le Bélial'),
(9, 'Simon and Schuster UK'),
(10, 'Editions Gallimard');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(10) unsigned NOT NULL,
  `pseudo` varchar(45) DEFAULT NULL,
  `mail` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `pseudo`, `mail`, `password`, `is_admin`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$K28V9o9zlRWOrmR//dkvyOIJMrPK.j86HJ3brGpGfF.LXSgNLTdJ6', 1),
(2, 'Fahim', 'fahim@fahim.com', '$2y$10$P5DbAMS3xYpNREqddjSCgeDULU9gNnyzfktj2YeqNYu17FDayzk.i', 0),
(3, 'Silene', 'silene@silene.com', '$2y$10$wl3bm8aODZ2oLWOxOGBpt.v.u.RNvlTdD1f1yamKYpPxEOgTsbg8C', 0),
(4, 'Siham', 'siham@siham.com', '$2y$10$K5bGrUovQ87xhymMyrHUnOh6IS.D0GjfE.d3PYw3yJW6KjoDsu6uy', 0),
(5, 'Gabriel', 'gabi@gabi.com', '$2y$10$eWcIct2.Z5bLlcyLPx9k/exk0AauTmQSw6v.6UjF/2Mi6bVYBprJG', 0),
(6, 'Clarisse', 'clarisse@clarisse.com', '$2y$10$6C5i1jdtl0O2kIb3cfaoJOR7lR.Qe9Aj7JehFEgC9ng8i2Xn/yq72', 0),
(7, 'Lucas', 'lucas@lucas.com', '$2y$10$UI0DURTzbnfYK9Xf/2VZXuPfYVFdnyZLfn0dA0NQPKHLcwlhlJiZy', 0),
(8, 'Sephir', 'sephir@sephir.com', '$2y$10$m05ILLYunO5SEwg7w5JO/OWbf1Nqqje8/DM/WkD5.lOfiVAAbKFG2', 0);

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
  MODIFY `id_author` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `book`
--
ALTER TABLE `book`
  MODIFY `id_book` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `editor`
--
ALTER TABLE `editor`
  MODIFY `id_editor` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
