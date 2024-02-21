ALTER TABLE `users`
ADD `identification_id` VARCHAR(255) NULL AFTER `uniq_id`,
ADD `business_name` VARCHAR(255) NULL AFTER `identification_id`;