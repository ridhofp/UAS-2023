-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2023 at 08:07 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas-2023`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_komentar`
--

CREATE TABLE `table_komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_posting` int(11) NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_komentar`
--

INSERT INTO `table_komentar` (`id_komentar`, `id_posting`, `komentar`) VALUES
(1, 1, 'ini adalah komentar no 1'),
(3, 1, 'halooo'),
(4, 5, 'aku tidak makan'),
(6, 1, 'Daftar tunggu haji d banjar masin aja 35 thun skrang gak bahkan haji plus aja skrang tunggu ny smpai 3/5 tahun gak mungkin bngat ini daftar bsa lngsung brangkat'),
(7, 1, 'Ini punya ustad itu ya? Ogah lah. Yang lebih baik juga banyak😁😁'),
(8, 1, 'ntr hoax..'),
(9, 1, 'kurang menanggapi dengan baik\r\n'),
(10, 1, 'tidak bermutu!'),
(12, 1, 'konten negatif tidak seharusnya ada'),
(13, 1, 'negatif'),
(14, 11, 'Smg bs k baitullah brsm pasangan n ortu'),
(15, 11, 'Smoga bisa umroh dan haji bersama pasangan.. Aamiin'),
(16, 11, 'Alhamdulillah bln Desember kemarin ikut umroh Akbar bareng ustad Yusuf Mansyur bareng suami , mohon doanya bisa cepat haji ikut Daqu trevel'),
(17, 11, 'Hahahhahaha paa syal jatoh😆 adminnya suka nonton sinetron atau drama korea? 😜 duhhh semoga bisa ke baitullah lagi sama orangtua dan pastinya bersama @daqutravel lagiiiiii😍'),
(18, 11, 'Kabulkan ya Allah....'),
(19, 11, 'tidak berangkat'),
(20, 11, 'aku tidak suka postingan ini'),
(21, 5, 'Aamiin'),
(22, 5, 'Smoga Allah SWT berikan kemudahan untuk beribadah umrah ..Aamiin '),
(23, 5, 'Terima kasih @daqutravel 🙏😍'),
(24, 12, 'Masyaallah umrah bersama daqu travel emang keren, pelayanannya bagus, nyaman, pembimbingnya keren dan bagus. Pokoknya umrah edutrip luar biasa, nikmat, perjalanan penuh hikmah. Terima kasih kyai Muhajirin, usatazah Eva, para Muthowif. Terima kasih Daqu Travel'),
(25, 14, 'Aamiin.. ustadz Jaya ikut ga yah'),
(26, 14, 'Boleh tau biayanya?'),
(27, 14, 'stadz pembimbing siapa neh.. ustadz Agus Jumadi dan ustadz Reza ikut gak ne..? Insyaallah kalo udah gak ada virus-virus ikutan dah semoga lancar semua Aamiin'),
(28, 14, 'Sehat semua jamaah dan dilancarkan semuanya, aamiin'),
(29, 14, 'tidak ada biayanya, komentar negatif'),
(30, 6, 'Khusus ramadhan udh ada belum min?'),
(31, 6, 'Umroh plus cairo gmna masih bsa?'),
(32, 6, 'Anak usia 4 tahun boleh kah'),
(33, 6, 'Masyallah...😍'),
(34, 15, 'ماشاءالله.......berkah....berkah.....'),
(35, 15, 'Masyaalah aamiin'),
(36, 15, 'Berkaaah InsyaAllah ❤️'),
(37, 15, 'Berkaah..'),
(38, 15, 'Aamiin');

-- --------------------------------------------------------

--
-- Table structure for table `table_posting`
--

CREATE TABLE `table_posting` (
  `id_posting` int(11) NOT NULL,
  `judul_posting` text NOT NULL,
  `tgl_posting` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_posting`
--

INSERT INTO `table_posting` (`id_posting`, `judul_posting`, `tgl_posting`) VALUES
(1, 'HAJI LANGSUNG BERANGKAT\r\n\r\n\"Dan Haji Mabrur tidak ada balasan yang pantas baginya kecuali Surga\" HR. Bukhari dan Muslim\r\n\r\nHaji Khusus Kuota Daqu Travel :\r\nBooking Seat USD. 5.000\r\n(masa tunggu 6-7 tahun)\r\nHarga USD. 12.500*\r\n\r\nHaji Khusus Non Kuota Daqu Travel :\r\nBooking Seat USD. 8.500\r\n(Langsung berangkat tahun yang sama)\r\nHarga USD. 19.500*\r\n\r\nBiaya Haji khusus di atas adalah yang dikenakan pata tahun keberangkatan 2020 M / 1441 H\r\n\r\nSemoga Allah kasih kesempatan kepada kita ke Tanah Suci.. Untuk berUmroh atau berHaji..\r\n\r\nMasih tersedia Seat Keberangkatan Umroh di Tanggal :\r\n16 Maret 2020 (Umroh Edutrip)\r\n06 April 2020\r\n14 April 2020\r\n15 April 2020\r\n21 April 2020 (Awal Ramadhan)\r\n05 Mei 2020 (Nuzulul Qur\'an)\r\n12 Mei 2020 (Lailatul Qadar)\r\n29 Mei 2020 (Syawal)\r\n31 Agustus 2020 (Awal Musim 1442)\r\n\r\nInformasi Program Haji dan Umroh Daqu Travel hubungi :\r\n021 73451933 (Office)\r\n0822 5000 3876 (Dede)\r\n0812 9000 9344 (Ozi)\r\n\r\n', '2023-08-01'),
(5, 'ADA VALUE TERSENDIRI\r\n.\r\n.\r\nTerimakasih atas kepercayaan Para Jamaah yang telah menjadikan Daqu Travel sebagai biro perjalanan Ibadah umrohnya..', '0000-00-00'),
(6, 'UPDATE UMROH NEW NORMAL !!\r\n.\r\nAlhamdulillah batas Usia yang diperbolehkan Umroh saat ini 18-60 tahun, yang sebelumnya 18-50 tahun.\r\n.\r\nBuat #SahabatDaqu yang Usianya dibawah 61 tahun sudah bisa mendaftar langsung sekarang juga 😊\r\n.\r\nSemoga dengan izin Allah Sahabat semuanya bisa secepatnya berkunjung keBaitullah. Aminn 🕋🤲', '0000-00-00'),
(11, 'UMROH BARENG PASANGAN . . Siapa yg mau ke Tanah Suci bareng Pasangan..?? . Ke Tanah Suci memang jadi idaman umat muslim. Apalagi perginya bareng pasangan. Perempuan yg sudah bersuami sangat dianjurkan ke Tanah Suci bareng suaminya, agar terhindar dari fitnah. Selain itu, juga bisa memberikan banyak manfaat lain', '2023-08-02'),
(12, 'Assalamualaikum Sahabat 😇🙏🏻😇  Alhamdulillah tahun 2022 Daqu Travel ada program Edutrip, program untuk anak sekolah yang ingin merasakan belajar sambil beribadah umroh dengan fasilitas dan layanan terbaik dari DaquTravel selama 11 Hari. XtraIbadah XtraPahala XtraManfaatnya. Jadi,Tunggu Apalagi?! yuk segerakan!!!', '2023-08-02'),
(14, 'INSYAA ALLAH LANCAAAAR . Alhamdulilah keberangkatan Umrah New Normal Daqu Travel bersama HIMPUH telah berangkt menuju Madinah. Insyaa Allah diberikan kelancaran dan kemudahan. Aamiin..', '2023-08-02'),
(15, 'BERKAAAAH . . Alhamdulillah hari ini Daqu Travel menjalankan amanah dari Jamaah Umroh dan Haji berupa sedekah yang kami salurkan melalui PPPA Daarul Quran bertepatan dengan Hari Sedekah Nasional.. . Semoga Allah memberikan keberkahan kepada kita semua.. . Semoga wabah covid-19 segera usai dan Allah memberikan kesempatan kepada kita semua mengunjungi Tanah Suci', '2023-08-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_komentar`
--
ALTER TABLE `table_komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_posting` (`id_posting`);

--
-- Indexes for table `table_posting`
--
ALTER TABLE `table_posting`
  ADD PRIMARY KEY (`id_posting`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_komentar`
--
ALTER TABLE `table_komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `table_posting`
--
ALTER TABLE `table_posting`
  MODIFY `id_posting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `table_komentar`
--
ALTER TABLE `table_komentar`
  ADD CONSTRAINT `fk_posting` FOREIGN KEY (`id_posting`) REFERENCES `table_posting` (`id_posting`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
