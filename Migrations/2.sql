CREATE TABLE `produits` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `titre` VARCHAR(255) NOT NULL,
    `prix` DECIMAL NOT NULL DEFAULT 0,
    `created_by` INT NOT NULL REFERENCES `user` (`id`),
    UNIQUE `produit_id_unique` (`id`)
) ENGINE = InnoDB;