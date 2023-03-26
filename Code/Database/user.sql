create table `users`(
    `email` varchar(255) not null,
    `password` varchar(255)
)engine=InnoDB default charset=utf8mb4 collate=utf8mb4_unicode_ci;
alter table `users` add primary key (`email`);
create table `deliveryMan`(
    `email` varchar(255) not null,
    `name` varchar(255) not null,
    `contact_no` numeric(11) default null,
    `area` varchar(255) not null,
    `district` varchar(255) not null,
    `division` varchar(255) not null,
    constraint `deliveryMan_fk` foreign key (`email`) references `users` (`email`)
)engine=InnoDB default charset=utf8mb4 collate=utf8mb4_unicode_ci;
create table `admin`(
    `email` varchar(255) not null,
    `name` varchar(255) not null,
    constraint `admin_fk` foreign key (`email`) references `users` (`email`)
)engine=InnoDB default charset=utf8mb4 collate=utf8mb4_unicode_ci;
create table `customer`(
    `email` varchar(255) not null,
    `fine_amount` numeric(4) not null,
    `effective_date` datetime not null,
    `status` tinyint(1) DEFAULT 0,
    constraint `customer_fk` foreign key (`email`) references `users` (`email`)
)engine=InnoDB default charset=utf8mb4 collate=utf8mb4_unicode_ci;
create table `book`(
    `ISBN` varchar(13) not null,
    `name` varchar(255) not null,
    `author` varchar(255) not null,
    `edition` varchar(3) not null,
    `publisher` varchar(255) not NULL,
    -- `book_picture` longblob DEFAULT NULL
)engine=InnoDB default charset=utf8mb4 collate=utf8mb4_unicode_ci;
alter table `book` add primary key (`ISBN`);
create table `location`(
    `location_id` numeric(10) NOT NULL,
    `area` varchar(255) not null,
    `district` varchar(255) not null,
    `division` varchar(255) not null,
    `delivery_point` varchar(255) not null,
    `day_of_week` varchar(255) not NULL
)engine=InnoDB default charset=utf8mb4 collate=utf8mb4_unicode_ci;
alter table `location` add primary key (`location_id`);
create table `all_copies_of_book`(
    `ISBN` varchar(13) not null,
    `copy_id` varchar(10) not null,
    constraint `all_copies_of_book_fk` foreign key (`ISBN`) references `book` (`ISBN`)
)engine=InnoDB default charset=utf8mb4 collate=utf8mb4_unicode_ci;
alter table `all_copies_of_book` add primary key (`ISBN`, `copy_id`);
create table `customer_book`(
    `email` varchar(255) not null,
    `ISBN` varchar(13) not null,
    `copy_id` varchar(10) not null,
    `return_date` datetime not null,
    `issue_date` datetime not null,
    constraint `fk_customer_book1` foreign key (`email`) references `users` (`email`),
    constraint `fk_customer_book2` foreign key (`ISBN`, `copy_id`) references `all_copies_of_book`(`ISBN`, `copy_id`)
)engine=InnoDB default charset=utf8mb4 collate=utf8mb4_unicode_ci;
create table `book_location_retrieval`(
    `retrieval_id` varchar(255) not null,
    `email` varchar(255) not null,
    `ISBN` varchar(13) not null,
    `copy_id` varchar(10) not null,
    `location_id` numeric(10) NOT NULL,
    `retrieval_date` datetime not null,
    constraint `fk_book_location_retrieval1` foreign key (`location_id`) references `location`(`location_id`),
    constraint `fk_book_location_retrieval2` foreign key (`ISBN`, `copy_id`) references `customer_book`(`ISBN`, `copy_id`),
    constraint `fk_book_location_retrieval3` foreign key (`email`) references `users` (`email`)
)engine=InnoDB default charset=utf8mb4 collate=utf8mb4_unicode_ci;
create table `book_location_delivery`(
    `delivery_id` varchar(255) not null,
    `email` varchar(255) not null,
    `ISBN` varchar(13) not null,
    `copy_id` varchar(10) not null,
    `location_id` numeric(10) NOT NULL,
    `delivery_date` datetime not null,
    constraint `fk_book_location_delivery1` foreign key (`location_id`) references `location`(`location_id`),
    constraint `fk_book_location_delivery2` foreign key (`ISBN`, `copy_id`) references `customer_book`(`ISBN`, `copy_id`),
    constraint `fk_book_location_delivery3` foreign key (`email`) references `users` (`email`)
)engine=InnoDB default charset=utf8mb4 collate=utf8mb4_unicode_ci;
alter table `deliveryMan` add primary key (`email`);
alter table `admin` add primary key (`email`);
alter table `customer` add primary key (`email`);
alter table `customer_book` add primary key (`email`, `ISBN`, `copy_id`);
alter table `book_location_retrieval` add primary key (`retrieval_id`);
alter table `book_location_delivery` add primary key (`delivery_id`);





