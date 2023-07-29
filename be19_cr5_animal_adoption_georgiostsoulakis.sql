-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2023 at 04:02 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be19_cr5_animal_adoption_georgiostsoulakis`
--
CREATE DATABASE IF NOT EXISTS `be19_cr5_animal_adoption_georgiostsoulakis` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `be19_cr5_animal_adoption_georgiostsoulakis`;

-- --------------------------------------------------------

--
-- Table structure for table `adoption`
--

CREATE TABLE `adoption` (
  `id` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `id_pet` int(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adoption`
--

INSERT INTO `adoption` (`id`, `id_user`, `id_pet`, `date`) VALUES
(13, 9, 11, '2023-07-29');

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(255) NOT NULL,
  `age` int(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `live` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `vaccinated` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'availiable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `age`, `size`, `live`, `description`, `image`, `breed`, `vaccinated`, `name`, `status`) VALUES
(9, 3, 'Medium', 'Mariahilferstraße 143', 'Dogs are a very faithful animal. It has a sharp mind and a strong sense of hearing smelling the things. It also has many qualities like swimming in the water, jumping from anywhere, good smelling sense.', 'defaultPet.png', 'Labrador (Dog)', 'vaccinated', 'Fluffy ', 'not availiable'),
(10, 10, 'Medium', 'Mariahilferstraße 143', 'Dogs are a very faithful animal. It has a sharp mind and a strong sense of hearing smelling the things. It also has many qualities like swimming in the water, jumping from anywhere, good smelling sense.', '64c4ee8b950b3.jpg', 'Husky (Dog)', 'vaccinated', 'Nala', 'availiable'),
(11, 2, 'Small', 'Mariahilferstraße 143 ', 'Nemo is a curious and impressionable six-year-old, only child who lives with his overprotective, single-parent father, Marlin. Having led a sheltered life, Nemo brims with the excitement of starting school and finally seeing the wonders of the Great Barrier Reef.', '64c4ef4c58d84.jpg', 'Clown Fish', 'vaccinated', 'Nemo', 'not availiable'),
(12, 13, 'Large', 'Mariahilferstraße 143', 'As a cub, Simba was quite adventurous, inquisitive, and impressionable. He highly admired his father, Mufasa, and wished to someday become a ruler as mighty as he, spending much of his time either learning the ways of a king or simply envisioning what life would be like with such power and self-esteem.', '64c4eff1511cd.jpeg', 'Lion', 'not vaccinated', 'Simba', 'availiable'),
(13, 2, 'Small', 'Mariahilferstraße 143', 'Tweety is a yellow canary in the Warner Bros. Looney Tunes and Merrie Melodies series of animated cartoons. The name Tweety is a play on words, as it originally meant sweetie, along with tweet being an English onomatopoeia for the sounds of birds.', '64c4f06d684d1.jpg', 'Canary', 'vaccinated', 'Tweety', 'availiable'),
(14, 5, 'Medium', 'Mariahilferstraße 143', 'Pikachu was designed around the concept of electricity. They are creatures that have short, yellow fur with brown markings covering their backs and parts of their lightning bolt-shaped tails. They have black-tipped, pointed ears and red circular pouches on their cheeks, which can spark with electricity.', '64c4f0f6d1fc1.jpg', 'Electric type', 'not vaccinated', 'Pikachu', 'availiable'),
(15, 100, 'Large', 'Mariahilferstraße 143', 'Pterodactylus was the first flying reptile to be recognized, a type of pterosaur that lived during the Jurassic period. Pterodactyl remains were found mainly in strata of the Upper Jurassic period of the Mesozoic century, in Europe and Africa', '64c517ff1415f.jpg', 'Dinosaur', 'not vaccinated', 'Pterodactylus', 'availiable'),
(16, 10, 'Small', 'Mariahilferstraße 143', 'Dory is a round-shaped regal blue tang with yellow on her fins and tail. She has magenta eyes, black spots, and a small but brightly colored dorsal fin. She has several dark blue freckles on and above her nose, slightly darker eyelids, and like both, her parents have flat teeth.', '64c518631b9f9.jpeg', 'Fish', 'vaccinated', 'Dory', 'availiable'),
(17, 15, 'Small', 'Mariahilferstraße 143', 'Jerry is usually described as an excited, carefree and cheeky mouse, he in several episodes is shown to be cold as he seeks to have fun no matter who he harms, which to Toms anger his sense of fun is sadistic, but he also has other targets although Tom is the main one among them.', '64c5194ee0c32.jpg', 'Mouse', 'not vaccinated', 'Jerry', 'availiable'),
(18, 12, 'Medium', 'Mariahilferstraße 143', 'According to the creators of Looney Tunes franchise, Road Runner has been described as a cheerful-hearted bird creature with the fastest speed powers that can help to have countless victories over Wile E. Coyote.', '64c519bfd2ecb.jpg', 'Wild Bird', 'not vaccinated', 'Road Runner', 'availiable');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `f_name` varchar(200) NOT NULL,
  `l_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `adrress` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `access` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `f_name`, `l_name`, `email`, `password`, `adrress`, `phone`, `image`, `access`) VALUES
(9, 'Georgios', 'Tsoulakis', 'georgtsou9@gmail.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'Hietzinger Kai !43', '066565183912', 'default.png', 'user'),
(10, 'Admin', 'Admin', 'admin@gmail.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'Mahü', '0066536271891', 'default.png', 'adm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoption`
--
ALTER TABLE `adoption`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pet` (`id_pet`);

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adoption`
--
ALTER TABLE `adoption`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adoption`
--
ALTER TABLE `adoption`
  ADD CONSTRAINT `adoption_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `adoption_ibfk_2` FOREIGN KEY (`id_pet`) REFERENCES `animals` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
