
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- cookieconsent_options
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cookieconsent_options`;
CREATE TABLE  `cookieconsent_options`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `style` VARCHAR(255),
    `banner_placement` VARCHAR(255),
    `tag_placement` VARCHAR(255),
    `privacy_settings_tags` VARCHAR(255),
    `banner_display_mode` VARCHAR(255),
    `consent` VARCHAR(255),
    PRIMARY KEY (`id`)
);

-- ---------------------------------------------------------------------
-- cookieconsent_type
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cookieconsent_type`;
CREATE TABLE IF NOT EXISTS `cookieconsent_type`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255),
    `active` INTEGER,
    PRIMARY KEY (`id`)
);

-- ---------------------------------------------------------------------
-- cookieconsent_type_i18n
-- ---------------------------------------------------------------------
DROP TABLE IF EXISTS `cookieconsent_type_i18n`;
CREATE TABLE IF NOT EXISTS `cookieconsent_type_i18n`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `locale` VARCHAR(5),
    `title` VARCHAR(255),
    `description` VARCHAR(255),
    `link` VARCHAR(255),
    PRIMARY KEY (`id`, `locale`)
);

/*Data for the table `cookieconsent_options` */
INSERT INTO `cookieconsent_options`(`id`,`style`,`banner_placement`,`tag_placement`,`privacy_settings_tags`,`banner_display_mode`,`consent`) 
VALUES (1,'light','false','vertical-right',1,'push','implicit');

/*Data for the table `cookieconsent_type` */
INSERT INTO `cookieconsent_type`(`id`,`name`,`active`) VALUES (1,'social',0);
INSERT INTO `cookieconsent_type`(`id`,`name`,`active`) VALUES (2,'analytics',0);
INSERT INTO `cookieconsent_type`(`id`,`name`,`active`) VALUES (3,'advertising',0);
INSERT INTO `cookieconsent_type`(`id`,`name`,`active`) VALUES (4,'necessary',0);

/*Data for the table `cookieconsent_type_i18n` */
INSERT INTO `cookieconsent_type_i18n`(`id`,`locale`,`title`,`description`,`link`) VALUES (1,'en_US','Social Media','Facebook, Twitter and other social websites need to know who you are to work properly.',NULL);
INSERT INTO `cookieconsent_type_i18n`(`id`,`locale`,`title`,`description`,`link`) VALUES (1,'fr_FR','Réseaux sociaux','Facebook, Twitter et les autres réseaux sociaux ont besoin de savoir qui vous êtes afin de mieux fonctionner.',NULL);
INSERT INTO `cookieconsent_type_i18n`(`id`,`locale`,`title`,`description`,`link`) VALUES (2,'en_US','Analytics','We anonymously measure your use of this website to improve your experience.',NULL);
INSERT INTO `cookieconsent_type_i18n`(`id`,`locale`,`title`,`description`,`link`) VALUES (2,'fr_FR','Analytique',"Nous mesurons anonymement votre navigation afin d'améliorer votre navigation sur le site.",NULL);
INSERT INTO `cookieconsent_type_i18n`(`id`,`locale`,`title`,`description`,`link`) VALUES (3,'en_US','Advertising','Adverts will be chosen for you automatically based on your past behaviour and interests.',NULL);
INSERT INTO `cookieconsent_type_i18n`(`id`,`locale`,`title`,`description`,`link`) VALUES (3,'fr_FR','Publicité','Publicité en ligne.',NULL);
INSERT INTO `cookieconsent_type_i18n`(`id`,`locale`,`title`,`description`,`link`) VALUES (4,'en_US','Strictly necessary','Some cookies on this website are strictly necessary and cannot be disabled.',NULL);
INSERT INTO `cookieconsent_type_i18n`(`id`,`locale`,`title`,`description`,`link`) VALUES (4,'fr_FR','Strictement nécessaire','Cookie strcitement nécessaire au fonctionnement du site web.',NULL);



# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;