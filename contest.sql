-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 22 2016 г., 13:30
-- Версия сервера: 5.6.16
-- Версия PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `contest`
--

-- --------------------------------------------------------

--
-- Структура таблицы `mavzu`
--

CREATE TABLE IF NOT EXISTS `mavzu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mav_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `mavzu`
--

INSERT INTO `mavzu` (`id`, `mav_name`) VALUES
(1, 'Tarmoqlanuvchi'),
(2, 'Takrorlanuvchi');

-- --------------------------------------------------------

--
-- Структура таблицы `monitor`
--

CREATE TABLE IF NOT EXISTS `monitor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `monitor`
--

INSERT INTO `monitor` (`id`, `user_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `problem`
--

CREATE TABLE IF NOT EXISTS `problem` (
  `UID` bigint(20) NOT NULL AUTO_INCREMENT,
  `ID` varchar(255) NOT NULL,
  `Problem_name` varchar(100) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `mavzu` int(100) NOT NULL,
  `Body` mediumtext NOT NULL,
  `Input` mediumtext NOT NULL,
  `Output` mediumtext NOT NULL,
  `InSample` mediumtext NOT NULL,
  `OutSample` mediumtext NOT NULL,
  `CreatedOn` bigint(20) DEFAULT NULL,
  `TimeLimit` int(11) NOT NULL,
  `MemoryLimit` bigint(20) NOT NULL,
  `Ball` int(11) NOT NULL,
  `contest` int(11) NOT NULL,
  `foiz` int(11) NOT NULL,
  `manba` varchar(500) NOT NULL,
  PRIMARY KEY (`UID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=301 ;

--
-- Дамп данных таблицы `problem`
--

INSERT INTO `problem` (`UID`, `ID`, `Problem_name`, `Title`, `mavzu`, `Body`, `Input`, `Output`, `InSample`, `OutSample`, `CreatedOn`, `TimeLimit`, `MemoryLimit`, `Ball`, `contest`, `foiz`, `manba`) VALUES
(300, 'A1001', 'Uchta son', 'A', 1, 'Sizga uchta A,B,C natural 1000 dan oshmagan sonlar beriladi.Sizning vazifangiz shu sonlarni eng kattasi va  eng kichikigini ko`paytmasini topishdan iborat.', ' Bitta qatorda 3 ta son berilgan(1&#8804; A,B,C &#8804 ;10<sup>3</sup>).', 'Bitta sonni – masalaning javobini chiqaring.', '24 2 45', '1080', NULL, 1000, 16000000, 1000, 0, 10, 'UrDU programming'),
(137, 'CO003', 'To''rtburchak perimetri', 'B', 2, 'ABC uchburchakka ichki aylana chizilgan. Aylana markazidan uchburchakning AB tomoniga parallel ravishda MN to’g’ri chiziq o’tkazilgan(ya’ni, M nuqta BC tomonda, N nuqta esa AC tomonda yotadi). Sizga AB va MN uzunliklar berilgan bo’lsa, ABMN to’rtburchak perimetrini hisoblang.', 'Ikkita natural son, AB va MN kesma uzunliklari(1 &#8804; AB, MN &#8804; 10000).', 'Bitta butun son, to’rtburchak perimetri.', '5 3', '11', NULL, 1000, 16000000, 1000, 1, 10, 'Matlatipov Sanatbek'),
(135, 'CO001', 'Tok kuchi', 'C', 2, 'Zanjiring kuchlanishi U va qarshiligi R. Zanjirdan oqib o`tayotgan to`q kuchini toping.', ' ikkita butun son U va R (1&#8804;U,R&#8804;100)', ' bitta son masala yechimi 10<sup>-3</sup> aniqlikda.', '8 7', '1.143', NULL, 1000, 16000000, 1000, 1, 10, 'Matlatipov Sanatbek'),
(136, 'CO002', 'Zanjir', 'D', 1, 'Zanjirlaring R1,R2 va R3 qarshilig o`zaro parallel ulangan. Ularnig umumiy qarshiligini toping. ', ' uchta butun son R1,R2,R3 (1&#8804;R1,R2,R3&#8804;100)', 'bitta son masala yechimi 10<sup>-2</sup> aniqlikda.', '1 7 3', '0.68', NULL, 1000, 16000000, 1000, 1, 10, 'Matlatipov Sanatbek'),
(48, 'P0017', 'Sondagi Aylana', 'E', 1, 'Sizni vazifangiz juda oddiy N sonidagi aylanalar sonini topishdir.<br>\r\nMasalan:<br>\r\n    157892 = 3<br>\r\n     203516 = 2<br>\r\n     409578 = 4<br>\r\n     236271 = ?<br>\r\n', 'Bir satrda Bitta butun N (0 &lt;= N &lt;= 10<sup>100</sup>) soni beriladi.', 'N sonidagi aylanalar sonini olib chiqing.', 'Simple 1<br>\r\n157892<br>\r\n<br>\r\nSimple 2<br>\r\n203516<br>\r\n<br>\r\nSimple 3<br>\r\n409578<br>\r\n<br>\r\n', 'Simple 1<br>\r\n3<br>\r\n<br>\r\nSimple 2<br>\r\n2<br>\r\n<br>\r\nSimple 3<br>\r\n4<br>', NULL, 1000, 16000000, 0, 0, 16, 'Acmp.ru'),
(43, 'P0012', 'Dasturchilar kuni', 'H', 0, 'Biz hammamiz Dasturchilar kun haqida bilamiz . Bu bayram har yilning 255 kuniga tushadi.\r\nSizning vazifangiz N - yil bayram qaysi kunga tushushini topib berishdan iborat.', 'Bitta satrda N butun son beriladi N [1 9999] segmentga tegishli', 'Javobni DD/MM/YYYY ko''rinishda olib chiqing.', 'Simple 1<br>\r\n2000<br>\r\n<br>\r\nSimple 2<br>\r\n2015<br>', 'Simple 1<br>\r\n12/09/2000<br>\r\n<br>\r\nSimple 2<br>\r\n13/09/2015<br>', NULL, 1000, 64000000, 0, 0, 13, 'Acmp.ru'),
(47, 'P0016', 'Fibonachi soni', 'F', 5, 'Biz Fibonachi ketma ketligi haqida ma''lumotga egamiz.a<sub>0</sub>, a<sub>1</sub>, ..., a<sub>n</sub>, ..., <br>a<sub>0</sub> = 0, a<sub>1</sub> = 1, a<sub>k</sub> = a<sub>k-1</sub> + a<sub>k-2</sub> (k &gt; 1)<br>\r\nBu ketma-ketlikni N - hadini chiqaring.', 'Bir satrda N (0 &#8804; N &#8804; 30) \r\nberiladi', 'N- Fibonachi sonini chiqaring', 'Simple 1<br>\r\n7', 'Simple 1<br>\r\n13', NULL, 1000, 16000000, 0, 0, 16, 'Acmp.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `problemdata`
--

CREATE TABLE IF NOT EXISTS `problemdata` (
  `UID` bigint(20) NOT NULL AUTO_INCREMENT,
  `ProblemID` varchar(255) NOT NULL,
  `Accepted` decimal(20,2) NOT NULL,
  `Attempts` int(11) NOT NULL,
  PRIMARY KEY (`UID`),
  UNIQUE KEY `ProblemID` (`ProblemID`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `problemdata`
--

INSERT INTO `problemdata` (`UID`, `ProblemID`, `Accepted`, `Attempts`) VALUES
(1, 'CO001', '1.00', 1),
(2, 'CO002', '0.00', 0),
(3, 'CO003', '0.00', 0),
(4, 'CO004', '0.00', 0),
(5, 'P0012', '0.00', 0),
(6, 'P0016', '0.00', 0),
(7, 'P0017', '1.00', 1),
(8, 'A1001', '1.00', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `UID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Problem_ID` varchar(255) NOT NULL DEFAULT 'A0001',
  `Lang_ID` varchar(20) NOT NULL DEFAULT 'c++',
  `Source` mediumtext NOT NULL,
  `FileName` varchar(255) NOT NULL,
  `User_UID` int(11) NOT NULL,
  `CreatedOn` bigint(20) DEFAULT NULL,
  `CreatedTime` int(11) NOT NULL,
  `Send_Time` datetime NOT NULL,
  `State` int(11) NOT NULL,
  `TestCase` int(11) DEFAULT '0',
  `contest` int(11) NOT NULL,
  `Ball` int(11) NOT NULL,
  `IP` varchar(50) NOT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `task`
--

INSERT INTO `task` (`UID`, `Problem_ID`, `Lang_ID`, `Source`, `FileName`, `User_UID`, `CreatedOn`, `CreatedTime`, `Send_Time`, `State`, `TestCase`, `contest`, `Ball`, `IP`) VALUES
(1, 'A1001', 'c++', 'Salom guruppadagilar', 'main', 1, NULL, 0, '2016-02-19 12:20:03', 2, 5, 0, 0, '127.0.0.1'),
(2, 'CO001', 'c++', 'Salom puruppadagilar', 'main', 1, NULL, 0, '2016-02-19 12:23:39', 1, 0, 0, 0, '127.0.0.1'),
(3, 'P0017', 'c++', 'Salom sdlkasjlksdfj f', 'main', 2, NULL, 0, '2016-02-19 12:26:03', 1, 0, 0, 0, '127.0.0.1'),
(4, 'P0012', 'c++', '#include <iostream>\r\n#include <math.h>\r\n#include <stdio.h>\r\n#include <stdlib.h>\r\n#include <ctime>\r\nusing namespace std;\r\n\r\nint main()\r\n{\r\n        double h = 0.25;\r\n\r\n        int distance = (int) (1 / h);\r\n        int x0 = 2;\r\n        int y0 = 1;\r\n        int i = y0;\r\n        int j = x0;\r\n        int count = 0;\r\n        int n = 100; // 100 marta chegaraga chiqarish\r\n        double fi[100];\r\n        srand(time(NULL));\r\n        while (true) {\r\n            i = y0;\r\n            j = x0;\r\n            while (true) {\r\n                double step = (double)(rand()%1000 + 1)/1000;\r\n                if (0 < step && step <= 0.25) {\r\n                    j = j + 1;\r\n                } else if (0.25 < step && step <= 0.5) {\r\n                    i = i - 1;\r\n                } else if (0.5 < step && step <= 0.75) {\r\n                    j = j - 1;\r\n                } else if (0.75 < step && step <= 1) {\r\n                    i = i + 1;\r\n                }\r\n                if ((i == 0) || (j == 0) || (i == distance) || j == distance) {\r\n                    fi[count] = h * h * (j * j - i * i);\r\n                    count++;\r\n                    break;\r\n                }\r\n            }\r\n            if (count == n) {\r\n                break;\r\n            }\r\n\r\n\r\n        }\r\n        double s = 0;\r\n        for (int m = 0; m < n; m++) {\r\n            s = s+ fi[m];\r\n            cout<<"("<<(m + 1)<<")"<<fi[m]<<endl;\r\n        }\r\n        cout<<(s / n)<<endl;\r\n    return 0;\r\n}\r\n', 'main', 2, NULL, 0, '2016-05-21 23:48:14', 1, 0, 0, 0, '127.0.0.1');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UID` bigint(20) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `Login` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `FName` varchar(25) NOT NULL,
  `BDate` varchar(25) NOT NULL,
  `pol` tinyint(1) NOT NULL,
  `RegisterData` date NOT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`UID`, `type`, `Login`, `Password`, `Name`, `FName`, `BDate`, `pol`, `RegisterData`) VALUES
(1, 2, 'mehmed_77', 'dafe762878fddf1f7989e163686a9264', 'Habibullayev', 'Muhammad', '1992-10-25', 1, '2016-02-19'),
(2, 2, 'mehmed', 'dafe762878fddf1f7989e163686a9264', 'King', 'Mehmed', '1994-5-1', 1, '2016-02-19'),
(3, 2, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '1990-1-1', 1, '2016-05-21');

-- --------------------------------------------------------

--
-- Структура таблицы `userdata`
--

CREATE TABLE IF NOT EXISTS `userdata` (
  `UID` bigint(20) NOT NULL AUTO_INCREMENT,
  `UserUID` bigint(20) NOT NULL,
  `Solved` int(11) NOT NULL,
  `Unsolved` int(11) NOT NULL,
  `Sent` int(11) NOT NULL,
  `Accepted` int(11) NOT NULL,
  `Wrong` int(11) NOT NULL,
  `CompError` int(11) NOT NULL,
  `RuntimeError` int(11) NOT NULL,
  `TimeLimit` mediumint(9) NOT NULL,
  `MemoryLimit` int(11) NOT NULL,
  `SolvedData` mediumtext NOT NULL,
  `UnsolvedData` mediumtext NOT NULL,
  `LastAccept` bigint(20) NOT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `userdata`
--

INSERT INTO `userdata` (`UID`, `UserUID`, `Solved`, `Unsolved`, `Sent`, `Accepted`, `Wrong`, `CompError`, `RuntimeError`, `TimeLimit`, `MemoryLimit`, `SolvedData`, `UnsolvedData`, `LastAccept`) VALUES
(1, 1, 1, 1, 2, 1, 1, 0, 0, 0, 0, ':CO001:', ':A1001:', 1455866650),
(2, 2, 1, 0, 1, 1, 0, 0, 0, 0, 0, ':P0017:', '', 1455866779),
(4, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
