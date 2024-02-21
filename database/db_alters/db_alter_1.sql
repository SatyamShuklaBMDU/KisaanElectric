ALTER TABLE `users`
ADD `mobile_no` VARCHAR(255) NULL AFTER `password`,
ADD `profession` VARCHAR(255) NULL AFTER `mobile_no`;
