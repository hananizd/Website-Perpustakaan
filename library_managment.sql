-- Table structure for table `admin`
CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `pass` varchar(25) NOT NULL,
  `jenisKelamin` ENUM('Laki-laki', 'Perempuan') NOT NULL,
  `status` ENUM('Siswa', 'Mahasiswa', 'Guru', 'Dosen','Umum') NOT NULL,
  `institusi` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `noTelp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `admin`
INSERT INTO `admin` (`id`, `email`, `pass`, `jenisKelamin`, `status`, `institusi`, `alamat`, `noTelp`) VALUES
(1, 'idno22381@gmail.com', '123', 'Laki-laki', 'Dosen', 'Universitas Ahmad Dahlan', 'Yogyakarta', '081234567891');

-- Table structure for table `book`
CREATE TABLE `book` (
  `bookname` varchar(50) NOT NULL,
  `bookaudor` varchar(50) NOT NULL,
  `bookpub` varchar(50) NOT NULL,
  `bookyear` int(4) NOT NULL, 
  `bookid` int(11) NOT NULL,
  `bookdetail` varchar(110) NOT NULL,
  `bookquantity` varchar(25) NOT NULL,
  `bookpic` varchar(25) NOT NULL,
  `branch` varchar(110) NOT NULL,
  `bookprice` varchar(25) NOT NULL,
  `bookava` int(11) NOT NULL,
  `bookrent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `book`
INSERT INTO `book` (`bookname`, `bookaudor`, `bookpub`, `bookyear`, `id`, `bookdetail`, `bookquantity`, `bookpic`, `branch`, `bookprice`, `bookava`, `bookrent`) VALUES
('Scott Gallagher', 'no idea', 'Suscipit', 1999, 543, '2', 'arrow.jpg', 'it', '756', 16,  4),
('Ferris Mclaughlin', 'Est voluptates offi', 'Dolorem earum accusa', 1988, 432, '1', 'logo.png', 'it', '123', 21, 3),
('harry', 'Ut dolorem culpa ex', 'Eum proident quidem', 2000, 321, '3', 'arrow.png', 'it', 17. 10);

-- Table structure for table `requestbook`
CREATE TABLE `requestbook` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `bookid` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `usertype` varchar(25) NOT NULL,
  `bookname` varchar(25) NOT NULL,
  `issuedays` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for table `userdata`
CREATE TABLE `userdata` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `jenisKelamin` ENUM('Laki-laki', 'Perempuan') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(25) NOT NULL,
  `status` ENUM('Siswa', 'Mahasiswa', 'Guru', 'Dosen', 'Umum') NOT NULL,
  `institusi` varchar(50) NOT NULL,
  `noTelp` varchar(20) NOT NULL,
  `pass` varchar(25) NOT NULL,
  `type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `userdata`
INSERT INTO `userdata` (`id`, `name`, `email`, `pass`, `type`, `jenisKelamin`, `status`, `institusi`, `alamat`, `noTelp`) VALUES
(1, 'salman', 'idno22382@gmail.com', 'Salman12', 'student', 'Laki-laki', 'Mahasiswa', 'Universitas Negeri Yogyakarta', 'Yogyakarta', '082315267610'),
(2, 'Randall Burch', 'voqo@mailinator.com', 'Ratione2', 'student', 'Perempuan', 'Siswa', 'SMAN 1 Yogyakarta', 'Yogyakarta', '081076238904');
