-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 22 déc. 2023 à 14:02
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dashboard`
--

-- --------------------------------------------------------

--
-- Structure de la table `conso_elec_gaz_correze`
--

CREATE TABLE `conso_elec_gaz_correze` (
  `Opérateur` varchar(7) DEFAULT NULL,
  `Année` int(4) DEFAULT NULL,
  `Filière` varchar(11) DEFAULT NULL,
  `ConsommationAgricultureMWh` float DEFAULT NULL,
  `ConsommationIndustrieMWh` float DEFAULT NULL,
  `ConsommationTertiaireMWh` float DEFAULT NULL,
  `ConsommationRésidentielMWh` float DEFAULT NULL,
  `ConsommationSecteurInconnuMWh` float DEFAULT NULL,
  `ConsommationTotaleMWh` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `conso_elec_gaz_correze`
--

INSERT INTO `conso_elec_gaz_correze` (`Opérateur`, `Année`, `Filière`, `ConsommationAgricultureMWh`, `ConsommationIndustrieMWh`, `ConsommationTertiaireMWh`, `ConsommationRésidentielMWh`, `ConsommationSecteurInconnuMWh`, `ConsommationTotaleMWh`) VALUES
('Enedis', 2012, 'Electricité', 2326, 254074, 335010, 893896, 773, 1486080),
('RTE', 2012, 'Electricité', 0, 31789, 14744, 0, 0, 46533),
('RTE', 2013, 'Electricité', 0, 32371, 13958, 0, 0, 46329),
('GRDF', 2013, 'Gaz', 2024, 164404, 194120, 607314, 1357, 969219),
('GRT Gaz', 2013, 'Gaz', 0, 21516, 0, 0, 0, 21516),
('GRDF', 2014, 'Gaz', 1406, 152950, 161684, 494381, 949, 811370),
('RTE', 2015, 'Electricité', 0, 29955, 13449, 0, 0, 43405),
('GRDF', 2015, 'Gaz', 1616, 157101, 172541, 535405, 973, 867636),
('Enedis', 2016, 'Electricité', 2393, 280393, 336383, 876629, 175, 1495980),
('Enedis', 2017, 'Electricité', 2552, 275718, 344423, 864441, 58, 1487200),
('GRT Gaz', 2017, 'Gaz', 0, 6697, 0, 0, 0, 6697),
('Enedis', 2018, 'Electricité', 15931, 302064, 441613, 680485, 26885, 1466980),
('GRDF', 2018, 'Gaz', 1913, 249534, 213992, 407984, 125, 873550),
('Enedis', 2019, 'Electricité', 16661, 307205, 448903, 681359, 19837, 1473970),
('RTE', 2019, 'Electricité', 0, 32395, 7919, 0, 0, 40315),
('Enedis', 2020, 'Electricité', 15586, 297465, 436175, 683676, 1173, 1434080),
('Enedis', 2011, 'Electricité', 2392, 246744, 327305, 826628, 801, 1403870),
('GRT Gaz', 2011, 'Gaz', 0, 29907, 0, 0, 0, 29907),
('GRDF', 2012, 'Gaz', 1944, 157426, 193507, 594665, 1280, 948822),
('GRT Gaz', 2014, 'Gaz', 0, 11710, 0, 0, 0, 11710),
('Enedis', 2015, 'Electricité', 2430, 272233, 333463, 852849, 522, 1461500),
('GRT Gaz', 2015, 'Gaz', 0, 8570, 0, 0, 0, 8570),
('RTE', 2017, 'Electricité', 0, 35056, 10181, 0, 0, 45237),
('GRDF', 2017, 'Gaz', 1315, 172146, 177594, 563888, 1005, 915948),
('GRT Gaz', 2018, 'Gaz', 0, 8005, 0, 0, 0, 8005),
('GRT Gaz', 2020, 'Gaz', 0, 10676, 0, 0, 0, 10676),
('GRDF', 2021, 'Gaz', 1979, 248435, 193609, 402130, 0, 846155),
('GRDF', 2011, 'Gaz', 1289, 150637, 175590, 501468, 928, 829912),
('GRT Gaz', 2012, 'Gaz', 0, 28753, 0, 0, 0, 28753),
('Enedis', 2013, 'Electricité', 2246, 257713, 334799, 916495, 485, 1511740),
('Enedis', 2014, 'Electricité', 2293, 262879, 330025, 831356, 125, 1426680),
('RTE', 2014, 'Electricité', 0, 28525, 13699, 0, 0, 42224),
('RTE', 2016, 'Electricité', 0, 33399, 12051, 0, 0, 45450),
('GRDF', 2016, 'Gaz', 1454, 173164, 175084, 558487, 984, 909173),
('GRT Gaz', 2016, 'Gaz', 0, 7480, 0, 0, 0, 7480),
('RTE', 2018, 'Electricité', 0, 34911, 7690, 0, 0, 42602),
('GRDF', 2019, 'Gaz', 1828, 228533, 215013, 404421, 855, 850653),
('GRT Gaz', 2019, 'Gaz', 0, 9879, 0, 0, 0, 9879),
('RTE', 2020, 'Electricité', 0, 26527, 5591, 0, 0, 32119),
('GRDF', 2020, 'Gaz', 1518, 224516, 174566, 370501, 0, 771102),
('Enedis', 2021, 'Electricité', 14791, 307410, 455365, 725017, 862, 1503450),
('RTE', 2021, 'Electricité', 0, 33084, 6338, 0, 0, 39423),
('GRT Gaz', 2021, 'Gaz', 0, 11314, 0, 0, 0, 11314);

-- --------------------------------------------------------

--
-- Structure de la table `eco2mix_nouvelle_aquitaine`
--

CREATE TABLE `eco2mix_nouvelle_aquitaine` (
  `Année` int(4) DEFAULT NULL,
  `ConsommationMW` int(8) DEFAULT NULL,
  `ThermiqueMW` int(7) DEFAULT NULL,
  `NucléaireMW` int(8) DEFAULT NULL,
  `EolienMW` int(7) DEFAULT NULL,
  `SolaireMW` int(7) DEFAULT NULL,
  `HydrauliqueMW` int(7) DEFAULT NULL,
  `BioénergiesMW` int(7) DEFAULT NULL,
  `TCOThermique` int(1) DEFAULT NULL,
  `TCHThermique` int(2) DEFAULT NULL,
  `TCONucléaire` int(2) DEFAULT NULL,
  `TCHNucléaire` int(2) DEFAULT NULL,
  `TCOEolien` int(1) DEFAULT NULL,
  `TCHEolien` int(2) DEFAULT NULL,
  `TCOSolaire` int(1) DEFAULT NULL,
  `TCHSolaire` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `eco2mix_nouvelle_aquitaine`
--

INSERT INTO `eco2mix_nouvelle_aquitaine` (`Année`, `ConsommationMW`, `ThermiqueMW`, `NucléaireMW`, `EolienMW`, `SolaireMW`, `HydrauliqueMW`, `BioénergiesMW`, `TCOThermique`, `TCHThermique`, `TCONucléaire`, `TCHNucléaire`, `TCOEolien`, `TCHEolien`, `TCOSolaire`, `TCHSolaire`) VALUES
(2021, 86468643, 1819148, 73327698, 5292814, 7557275, 7804167, 2869660, 6, 25, 9, 15, 9, 24, 4, 47),
(2022, 38531299, 1064597, 21034612, 2362763, 3552078, 3701920, 1218465, 4, 20, 36, 27, 8, 24, 9, 32);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
