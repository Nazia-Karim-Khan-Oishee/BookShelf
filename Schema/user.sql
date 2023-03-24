create table `users`(
    `email` varchar(255) not null,
    `password` varchar(255),
    constraint `users_pk` primary key (`email`)
);
create table `deliveryMan`(
    `email` varchar(255) not null,
    `name` varchar(255) not null,
    `contact_no` number(11) default null,
    `area` varchar(255) not null,
    `district` varchar(255) not null,
    `division` varchar(255) not null,
    constraint `deliveryMan_pk` primary key (`email`),
    constraint `deliveryMan_fk` foreign key (`email`) references `users` (`email`)
);
create table `admin`(
    `email` varchar(255) not null,
    `name` varchar(255) not null,
    constraint `admin_pk` primary key (`email`),
    constraint `admin_fk` foreign key (`email`) references `users` (`email`)
);
create table `customer`(
    `email` varchar(255) not null,
    `fine_amount` number(4) not null,
    `effective_date` datetime not null,
    `status` tinyint(1) DEFAULT 0,
    constraint `customer_pk` primary key (`email`),
    constraint `customer_fk` foreign key (`email`) references `users` (`email`)
);
create table `book`(
    `ISBN` varchar(13) not null,
    `name` varchar(255) not null,
    `author` varchar(255) not null,
    `edition` varchar(3) not null,
    `publisher` varchar(255) not null,
    constraint `book_pk` primary key (`ISBN`)
);
create table `location`(
    `location_id` number(10) NOT NULL,
    `area` varchar(255) not null,
    `district` varchar(255) not null,
    `division` varchar(255) not null,
    `delivery_point` varchar(255) not null,
    `week_day` varchar(255) not null,
    constraint `location_pk` primary key (`location_id`)
);
create table `all_copies_of_book`(
    `ISBN` varchar(13) not null,
    `copy_id` varchar(10) not null,
    constraint `all_copies_of_book_pk` primary key (`ISBN`, `copy_id`),
    constraint `all_copies_of_book_fk` foreign key (`ISBN`) references `book` (`ISBN`)
);
create table `customer_book`(
    `email` varchar(255) not null,
    `ISBN` varchar(13) not null,
    `copy_id` varchar(10) not null,
    `return_date` datetime not null,
    `issue_date` datetime not null,
    constraint `customer_book_pk` primary key (`email`, `ISBN`, `copy_id`),
    constraint `fk_customer_book1` foreign key (`email`) references `users` (`email`),
    constraint `fk_customer_book2` foreign key (`ISBN`) references `book` (`ISBN`),
    constraint `fk_customer_book3` foreign key (`copy_id`) references `book`(`copy_id`)
);
create table `book_location_retrieval`(
    `retrieval_id` varchar(255) not null,
    `ISBN` varchar(13) not null,
    `copy_id` varchar(10) not null,
    `location_id` number(10) NOT NULL,
    `retrieval_date` datetime not null,
    constraint `book_location_retrieval_pk` primary key (`retrieval_id`),
    constraint `fk_book_location_retrieval1` foreign key (`ISBN`) references `book`(`ISBN`),
    constraint `fk_book_location_retrieval2` foreign key (`copy_id`) references `book`(`copy_id`),
    constraint `fk_book_location_retrieval3` foreign key (`location_id`) references `location`(`location_id`),
    constraint `fk_book_location_retrieval4` foreign key (`retrieval_date`) references `customer_book`(`return_date`) 
);
create table `book_location_delivery`(
    `delivery_id` varchar(255) not null,
    `ISBN` varchar(13) not null,
    `copy_id` varchar(10) not null,
    `location_id` number(10) NOT NULL,
    `delivery_date` datetime not null,
    constraint `book_location_delivery_pk` primary key (`delivery_id`),
    constraint `fk_book_location_delivery1` foreign key (`ISBN`) references `book`(`ISBN`),
    constraint `fk_book_location_delivery2` foreign key (`copy_id`) references `book`(`copy_id`),
    constraint `fk_book_location_delivery3` foreign key (`location_id`) references `location`(`location_id`),
    constraint `fk_book_location_delivery4` foreign key (`delivery_date`) references `customer_book`(`issue_date`) 
);
