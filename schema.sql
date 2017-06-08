-- -----------------------------------------------------
-- Table `games`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `games` ;

CREATE TABLE IF NOT EXISTS `games` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `created` DATETIME NULL DEFAULT NULL,
  `modified` DATETIME NULL DEFAULT NULL,
  `best_of` INT(11) NOT NULL COMMENT 'max number moves to win the game, best of X moves wins',
  `user_id` INT(11) NOT NULL,
  `is_player_winner` TINYINT(1) NULL DEFAULT NULL,
  `tournament_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `moves`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `moves` ;

CREATE TABLE IF NOT EXISTS `moves` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NULL DEFAULT NULL,
  `game_id` INT(11) NULL DEFAULT NULL,
  `player_move` CHAR(1) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `computer_move` CHAR(1) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `is_player_winner` TINYINT(1) NULL DEFAULT NULL,
  `created` DATETIME NULL DEFAULT NULL,
  `modified` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

-- -----------------------------------------------------
-- Table `tournament_memberships`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tournament_memberships` ;

CREATE TABLE IF NOT EXISTS `tournament_memberships` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `tournament_id` INT(11) NOT NULL,
  `user_id` INT(11) NOT NULL,
  `nick` VARCHAR(255) CHARACTER SET 'utf8' NOT NULL,
  `created` DATETIME NULL DEFAULT NULL,
  `modified` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `tournaments`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tournaments` ;

CREATE TABLE IF NOT EXISTS `tournaments` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) CHARACTER SET 'utf8' NOT NULL,
  `expiration_date` DATETIME NULL DEFAULT NULL,
  `created` DATETIME NULL DEFAULT NULL,
  `modified` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

-- -----------------------------------------------------
-- Table `users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `users` ;

CREATE TABLE IF NOT EXISTS `users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) CHARACTER SET 'utf8' NOT NULL,
  `password` VARCHAR(255) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `is_active` TINYINT(1) NULL DEFAULT '1',
  `first_name` VARCHAR(255) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `last_name` VARCHAR(45) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `is_superuser` TINYINT(1) NULL DEFAULT '0',
  `created` DATETIME NULL DEFAULT NULL,
  `modified` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;
