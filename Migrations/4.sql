CREATE TABLE `user_role` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `role` VARCHAR(255) NOT NULL,
    UNIQUE `user_id_unique` (`id`)
) ENGINE = InnoDB;

ALTER TABLE `user` ADD `role_id` INT NOT NULL DEFAULT 2 REFERENCES `user_role`(id);