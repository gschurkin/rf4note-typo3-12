CREATE TABLE tx_gsrf4note_domain_model_reservoir (
	name varchar(255) NOT NULL DEFAULT '',
	description text NOT NULL DEFAULT '',
	max_point_x int(11) NOT NULL DEFAULT '0',
	max_point_y int(11) NOT NULL DEFAULT '0',
	image int(11) unsigned NOT NULL DEFAULT '0',
	fishes int(11) unsigned NOT NULL DEFAULT '0'
);

CREATE TABLE tx_gsrf4note_domain_model_fish (
	name varchar(255) NOT NULL DEFAULT '',
	description text NOT NULL DEFAULT '',
	image int(11) unsigned NOT NULL DEFAULT '0',
	max_weight int(11) NOT NULL DEFAULT '0',
	reservoires int(11) unsigned NOT NULL DEFAULT '0'
);

CREATE TABLE tx_gsrf4note_domain_model_fishingtype (
	name varchar(255) NOT NULL DEFAULT '',
	description text NOT NULL DEFAULT '',
	lures int(11) unsigned NOT NULL DEFAULT '0'
);

CREATE TABLE tx_gsrf4note_domain_model_lure (
	name varchar(255) NOT NULL DEFAULT '',
	description text NOT NULL DEFAULT '',
	weight int(11) NOT NULL DEFAULT '0',
	image int(11) unsigned NOT NULL DEFAULT '0',
	types int(11) unsigned NOT NULL DEFAULT '0'
);

CREATE TABLE tx_gsrf4note_domain_model_point (
	name varchar(255) NOT NULL DEFAULT '',
	description text NOT NULL DEFAULT '',
	point_x int(11) NOT NULL DEFAULT '0',
	point_y int(11) NOT NULL DEFAULT '0',
	image int(11) unsigned NOT NULL DEFAULT '0',
	author int(11) NOT NULL DEFAULT '0',
	users int(11) unsigned NOT NULL DEFAULT '0',
	reservoir int(11) unsigned DEFAULT '0',
	fishes int(11) unsigned NOT NULL DEFAULT '0',
	type int(11) unsigned DEFAULT '0',
	lures int(11) unsigned DEFAULT '0',
	slug varchar(255) NOT NULL DEFAULT ''
);

CREATE TABLE fe_users (
	points int(11) unsigned NOT NULL DEFAULT '0'
);
