USE   users_Fakhrutdinova;
 
CREATE TABLE `role` (
  `Role_ID` int(11) NOT NULL,
  `name` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
 

INSERT INTO `role` (`Role_ID`, `name`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Guest');

 

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `name` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Role_ID` int(11) NOT NULL,
  `salt` varchar(15615) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
 
INSERT INTO `User` (`id`, `name`, `password`, `login`, `Role_ID`, `salt`) VALUES
(1, 'John', 'password', 'login', 1, NULL),
(2, 'Jane', 'password2', 'login2', 2, NULL),
(3, 'Michael', 'password3', 'michael789', 3, NULL),
(6, 'g', 'g', 'g', 1, NULL),
(7, 'gg', 'gg', 'gg', 2, NULL),
(8, 'dd', 'dd', 'dd', 2, NULL),
(9, 'rr', 'rr', 'rr', 2, NULL),
(10, 'rt', '4555', 'rt', 1, NULL),
(11, 'df', 'df', 'df', 1, NULL);

 
ALTER TABLE `role`
  ADD PRIMARY KEY (`Role_ID`);
 
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Role_ID` (`Role_ID`);

 
ALTER TABLE `role`
  MODIFY `Role_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

 
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

 
ALTER TABLE `User`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`Role_ID`) REFERENCES `role` (`Role_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

 