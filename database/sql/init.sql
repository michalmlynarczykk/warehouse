INSERT INTO `addresses` (`id`, `street`, `city`, `state`, `zip_code`, `created_at`, `updated_at`)
VALUES (1, 'Sportowa', 'Kraków', 'Małopolska', '30-024', '2023-12-20 21:38:55', '2023-12-20 21:38:55'),
       (2, '29 LISTOPADA', 'Kraków', 'Małopolska', '33-200', '2023-12-20 21:40:37', '2023-12-20 21:40:37');

INSERT INTO `items` (`id`, `name`, `price`, `available_amount`, `created_at`, `updated_at`)
VALUES (1, 'Opona letnia Continental SportContact 7', 487.99, 11, '2023-12-20 21:28:39', '2023-12-20 21:38:55'),
       (2, 'Opona wielosezonowa Continental AllSeasonContact 2', 380.00, 30, '2023-12-20 21:29:16',
        '2023-12-20 21:29:16'),
       (3, 'Opona zimowa Continental WinterContact TS 870', 369.00, 60, '2023-12-20 21:30:09', '2023-12-20 21:30:09'),
       (4, 'Opona zimowa Michelin Alpin 6', 399.00, 56, '2023-12-20 21:31:37', '2023-12-20 21:31:37'),
       (5, 'Opona letnia Michelin Pilot sport 4', 450.00, 40, '2023-12-20 21:32:22', '2023-12-20 21:32:22'),
       (6, 'Opona wielosezonowa Michelin CrossClimate 2', 401.99, 34, '2023-12-20 21:33:20', '2023-12-20 21:38:55'),
       (7, 'Opona letnia Hankook Ventus Prime4 K135', 250.99, 115, '2023-12-20 21:34:12', '2023-12-20 21:40:37'),
       (8, 'Opona letnia Pirelli Powergy', 500.99, 90, '2023-12-20 21:34:50', '2023-12-20 21:40:37'),
       (9, 'Opona letnia Austone SP802', 150.00, 92, '2023-12-20 21:35:26', '2023-12-20 21:38:55'),
       (10, 'Opona wielosezonowa Pirelli Cinturato All Season SF2', 699.99, 50, '2023-12-20 21:36:08',
        '2023-12-20 21:36:08'),
       (11, 'Opona wielosezonowa Goodride All Season Elite Z-401', 149.50, 140, '2023-12-20 21:36:51',
        '2023-12-20 21:36:51');

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`)
VALUES (1, 'admin', 'admin@test.pl', '$2y$12$2p5bInT95j9B/59mwwx2xOYVFpEP8/VHDdoQORdifHoZtm9S25Kba', 'ADMIN',
        '2023-12-20 21:26:12', '2023-12-20 21:26:12'),
       (2, 'user', 'user@test.pl', '$2y$12$WqnE0N/MB1NH1djxKujEWePxuNg7b202AFuIspUZWGCi3FCipyGeW', 'USER',
        '2023-12-20 21:26:25', '2023-12-20 21:26:25');


INSERT INTO `orders` (`id`, `status`, `user_id`, `address_id`, `created_at`, `updated_at`)
VALUES (1, 'PENDING', 2, 1, '2023-12-20 21:38:55', '2023-12-20 21:41:35'),
       (2, 'NEW', 2, 2, '2023-12-20 21:40:37', '2023-12-20 21:40:37');

INSERT INTO `order_items` (`id`, `order_id`, `item_id`, `quantity`, `created_at`, `updated_at`)
VALUES (1, 1, 1, 4, '2023-12-20 21:38:55', '2023-12-20 21:38:55'),
       (2, 1, 6, 10, '2023-12-20 21:38:55', '2023-12-20 21:38:55'),
       (3, 1, 7, 20, '2023-12-20 21:38:55', '2023-12-20 21:38:55'),
       (4, 1, 9, 30, '2023-12-20 21:38:55', '2023-12-20 21:38:55'),
       (5, 2, 7, 15, '2023-12-20 21:40:37', '2023-12-20 21:40:37'),
       (6, 2, 8, 10, '2023-12-20 21:40:37', '2023-12-20 21:40:37');

