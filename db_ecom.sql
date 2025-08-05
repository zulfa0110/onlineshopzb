-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2025 at 07:46 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_ecom`
--
CREATE DATABASE `db_ecom` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_ecom`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `idadmin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`idadmin`, `username`, `password`, `namalengkap`) VALUES
(1, 'nabila', 'nabila', 'AISYA NABILA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anggota`
--

CREATE TABLE IF NOT EXISTS `tbl_anggota` (
  `idanggota` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` char(1) NOT NULL,
  `tgllahir` date NOT NULL DEFAULT '0000-00-00',
  `alamat` text NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `foto` text NOT NULL,
  `tgldaftar` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idanggota`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`idanggota`, `email`, `password`, `nama`, `jk`, `tgllahir`, `alamat`, `nohp`, `foto`, `tgldaftar`) VALUES
(1, 'nabila@gmail.com', 'nabila', 'AISYA NABILA', 'L', '2005-01-07', 'solok', '082171103904', 'Screenshot 2024-02-12 152459.png', '2025-02-03 13:47:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_belanja`
--

CREATE TABLE IF NOT EXISTS `tbl_belanja` (
  `idbelanja` int(11) NOT NULL AUTO_INCREMENT,
  `idproduk` int(11) NOT NULL,
  `idanggota` int(11) NOT NULL,
  `jumlahbeli` int(11) NOT NULL,
  `tglbeli` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idbelanja`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_belanja`
--

INSERT INTO `tbl_belanja` (`idbelanja`, `idproduk`, `idanggota`, `jumlahbeli`, `tglbeli`) VALUES
(1, 2, 1, 6, '2025-02-03 14:28:41'),
(2, 3, 1, 3, '2025-02-03 14:35:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE IF NOT EXISTS `tbl_produk` (
  `idproduk` int(11) NOT NULL AUTO_INCREMENT,
  `idadmin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` double NOT NULL,
  `stok` int(11) NOT NULL,
  `spek` text NOT NULL,
  `diskon` int(11) NOT NULL,
  `foto1` text NOT NULL,
  `tglproduk` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idproduk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`idproduk`, `idadmin`, `nama`, `harga`, `stok`, `spek`, `diskon`, `foto1`, `tglproduk`) VALUES
(2, 1, 'Laptop Acer', 12000000, 6, 'keren', 7, 'Screenshot 2024-02-12 153136.png', '2025-02-03 12:54:31'),
(3, 1, 'laptop asus', 10000000, 9, 'Merah', 3, 'Screenshot 2024-02-12 152623.png', '2025-02-03 14:00:28');
