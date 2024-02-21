ALTER TABLE `rewards`
ADD `product_category` VARCHAR(255) NULL AFTER `name`,
ADD `product_name` VARCHAR(255) NULL AFTER `product_category`,
ADD `status` VARCHAR(255) NULL AFTER `points`;