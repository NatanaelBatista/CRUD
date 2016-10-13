CREATE TABLE `users` (
  `user_id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_name` VARCHAR(255) COLLATE utf8_bin DEFAULT NULL,
  `user` VARCHAR(20) COLLATE utf8_bin NOT NULL,
  `user_password` VARCHAR(20) COLLATE utf8_bin NOT NULL,
  `user_permissions` VARCHAR(20) COLLATE utf8_bin NOT NULL,
  `user_active` VARCHAR(3) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MYISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;