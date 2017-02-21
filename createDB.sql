create table Customers (
   username   varchar(10) primary key,
   password   varchar(32),
   address    varchar(100),
   phone	  varchar(20),
   email      varchar(45)
);

create table ShoppingBasket (
   basketId   varchar(13) primary key,
   username   varchar(10) references Customers (username)
);

create table Author (
ssn varchar(10) primary key,
name varchar(50),
address varchar(100),
phone varchar(20)
);

create table Book (
ISBN varchar(10) primary key,
Title varchar(50),
Year int(4),
Price float not null,
Publisher varchar(50)
);

create table WrittenBy (
ssn varchar(10) references Author (ssn),
ISBN varchar(10) references Book(ISBN)
);

create table Warehouse(
warehouseCode varchar(10) primary key,
name varchar(50),
address varchar(50),
phone varchar(20)
);

create table Stocks(
ISBN varchar(10) references Book (ISBN),
warehouseCode varchar(10) references Warehouse (warehouseCode),
number varchar(10)
);

create table Contains(
ISBN varchar(10) references Book (ISBN),
basketID varchar(13) references ShoppingBasket (basketID),
number varchar(10)
);

create table ShippingOrder(
ISBN varchar(10) references Book (ISBN),
warehouseCode varchar(10) references Warehouse (warehouseCode),
username varchar(10) references Customers (username),
number varchar(10)
);

insert into Customers values(
"Bryan92","YesYesYes","No.32,Brookes Street,Washington DC-890767","519-786-8812","bryan@gmail.com");

insert into Customers values(
"Rusev77","Rusev@RSA","No.45,Collins Street,Arlington-98767","890-445-7789","rusev_rsa@gmail.com");

insert into Customers values(
"BeckyL3","Bck@L3","No.678,RunAway Apt,Colarado Springs CO-45667","675-112-7765","bl3@yahoo.com");

insert into Customers values(
"MarkTkr","TS@PD","No.556,WalCreek Ave,Fresno CA-90675","510-555-1122","Mark_Take@hotmail.com");

insert into Customers values(
"Cenation45","UCanSeemee","No.12,Flyover Apts,Boston MA-44867","356-190-7760","cenation@gmail.com");


insert into ShoppingBasket values(
"00001","Bryan92");

insert into ShoppingBasket values(
"00002","BeckyL3");

insert into ShoppingBasket values(
"00003","MarkTkr");

insert into ShoppingBasket values(
"00004","Cenation45");

insert into ShoppingBasket values(
"00005","Rusev77");


insert into Author values(
"234-20-534","Cormen","No.21,NewLand Colony,Detroit MC-78124","323-899-9099");

insert into Author values(
"178-89-467","David Kung","No.34,North Collins Street,Arlington TX-89765","876-524-1967");

insert into Author values(
"679-02-453","Ullman","No.789,South View Apt,Chicago IL-17890","564-123-0956");

insert into Author values(
"190-44-256","Donald Hearn","No.889,Pleasant Colony,Miniapolis MS-11290","119-543-4590");

insert into Author values(
"907-54-721","Navathe","No.75,First Corpse Street,New Brosnwick NJ-67439","657-491-1654");

insert into Author values(
"211-543-789","Chris Dough","No.75,First Corpse Street,New Brosnwick NJ-67439","777-777-1954");

insert into Author values(
"110-998-965","Kofi","No.78,First Corpse Street,New Brosnwick NJ-67439","178-431-6189");

insert into Author values(
"907-54-678","Christian Cruiser","No.57,First Corner Street,New Delhi NJ-67439","327-481-2154");



insert into Book values(
"1-234-543","Data Structure and Algorithms",1997,345,"MIT Press");

insert into Book values(
"700-345-12","Theory of Computation",2003,79,"Pearson Education");

insert into Book values(
"43-235-987","Database System Concepts",2000,456,"Prentice Hall");

insert into Book values(
"234-564-23","Compiler Design",1990,236,"New Age Publication");

insert into Book values(
"45-98-234","Pattern Classification",1998,252,"MIT Press");

insert into Book values(
"1-789-444","Computer Architecture",1996,700,"Pearson Education");

insert into Book values(
"1-678-124","Embedded Systems",2009,190,"Oxford Publications");

insert into Book values(
"1-122-256","Digital Fundamentals",1991,990,"Amazon Publishers");



insert into WrittenBy values(
"234-20-534","1-234-543");

insert into WrittenBy values(
"178-89-467","45-98-234");

insert into WrittenBy values(
"679-02-453","700-345-12");

insert into WrittenBy values(
"190-44-256","234-564-23");

insert into WrittenBy values(
"907-54-721","43-235-987");

insert into WrittenBy values(
"211-543-789","1-678-124");

insert into WrittenBy values(
"110-998-965","1-122-256");

insert into WrittenBy values(
"907-54-678","1-789-444");


insert into Warehouse values(
"11678","Amazon Books","No.30,Rockefellar street,NY-67754","564-332-7123");

insert into Warehouse values(
"13452","Tiger Corp","No.43,Footplaza Center,NJ-32456","675-223-7654");

insert into Warehouse values(
"29087","24hours","No.56,Metalwoods Ave,CA-98775","513-869-4421");

insert into Warehouse values(
"34120","BuyEasy Stores","No.19,Mountain Hill Street,IL-98765","324-789-8856");

insert into Warehouse values(
"54678","eBay books","No.890,Moore Street,CA-90876","567-211-6751");


insert into Stocks values(
"1-234-543","11678","97001");

insert into Stocks values(
"45-98-234","34120","97002");

insert into Stocks values(
"700-345-12","54678","97030");

insert into Stocks values(
"234-564-23","13452","97300");

insert into Stocks values(
"43-235-987","29087","98001");

insert into Stocks values(
"1-234-543","29087","96789");

insert into Stocks values(
"700-345-12","29087","98799");

insert into Stocks values(
"45-98-234","11678","89901");

insert into Stocks values(
"1-789-444","13452","3000");

insert into Stocks values(
"1-678-124","34120","9000");

insert into Stocks values(
"1-122-256","54678","5500");


insert into Contains values(
"1-234-543","00005","89001");

insert into Contains values(
"43-235-987","00003","89010");

insert into Contains values(
"700-345-12","00002","89678");

insert into Contains values(
"45-98-234","00004","98301");

insert into Contains values(
"234-564-23","00001","88201");


insert into ShippingOrder values(
"43-235-987","29087","MarkTkr","98001");

insert into ShippingOrder values(
"45-98-234","34120","Cenation45","98301");

insert into ShippingOrder values(
"1-234-543","11678","Rusev77","89001");

insert into ShippingOrder values(
"700-345-12","54678","BeckyL3","89678");

insert into ShippingOrder values(
"234-564-23","13452","Bryan92","98001");





















