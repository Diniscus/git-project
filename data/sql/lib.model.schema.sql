
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- blog_post
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `blog_post`;


CREATE TABLE `blog_post`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`title` VARCHAR(255)  NOT NULL,
	`text` TEXT  NOT NULL,
	`activ` TINYINT  NOT NULL,
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
)ENGINE = InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
