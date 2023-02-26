drop table if exists Sportsman;
drop table if exists Competition;
drop table if exists Result;


create table Sportsman(
	id integer primary key autoincrement,
	name varchar(50),
	email varchar(50),
	phone_number integer(10),
	birth_date date;
	age integer(3),
	create_date datetime;
	passport int(10),
	middle_rate real(3),
	text(1000),
	vid varchar(256) #path to videofile
);

create table Competition(
	id integer primary key autoincrement,
	name varchar(50),
	sport_type varchar(50),
	date_ date
);

create table Result(
	id integer primary key autoincrement,
	sportsmanID integer,
	competitionID integer,
	foreign key (sportsmanID) references Sportsman(id),
	foreign key (competitionID) references Competition(id)
);

SELECT sportsmans.name, COUNT(results.competitionID) as num
FROM Sportsman sportsmans
JOIN Result results ON sportsmans.id = results.sportsmanID
GROUP BY sportsmans.id
ORDER BY num DESC
LIMIT 5;