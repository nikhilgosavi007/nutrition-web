#
# Table structure for table 'tx_nutritionweb_domain_model_nutritionist'
#
CREATE TABLE tx_nutritionweb_domain_model_nutritionist (

	name varchar(255) DEFAULT '' NOT NULL,
	slug varchar (2048),
	email varchar(255) DEFAULT '' NOT NULL,
	qualification varchar(255) DEFAULT '' NOT NULL,
	ratings varchar(255) DEFAULT '' NOT NULL,
	about text,
	services text,
	clients text NOT NULL,
	blogs text NOT NULL,
	specializations text NOT NULL

);

#
# Table structure for table 'tx_nutritionweb_domain_model_clients'
#
CREATE TABLE tx_nutritionweb_domain_model_clients (

	name varchar(255) DEFAULT '' NOT NULL,
	slug varchar (2048),
	email varchar(255) DEFAULT '' NOT NULL,
	age int(11) DEFAULT '0' NOT NULL,
	height int(11) DEFAULT '0' NOT NULL,
	weight int(11) DEFAULT '0' NOT NULL,
	bloodgroup varchar(255) DEFAULT '' NOT NULL,
	bmi int(11) DEFAULT '0' NOT NULL,
	photo int(11) unsigned NOT NULL default '0'

);

#
# Table structure for table 'tx_nutritionweb_domain_model_blog'
#
CREATE TABLE tx_nutritionweb_domain_model_blog (

	title varchar(255) DEFAULT '' NOT NULL,
	slug varchar (2048),
	author varchar(255) DEFAULT '' NOT NULL,
	date date DEFAULT NULL,
	description text,
	article text,
	image int(11) unsigned NOT NULL default '0'

);

#
# Table structure for table 'tx_nutritionweb_domain_model_specialization'
#
CREATE TABLE tx_nutritionweb_domain_model_specialization (

	name varchar(255) DEFAULT '' NOT NULL

);

#
# Table structure for table 'tx_nutritionweb_domain_model_clientreport'
#
CREATE TABLE tx_nutritionweb_domain_model_clientreport (

	title varchar(255) DEFAULT '' NOT NULL,
	report text,
	client int(11) unsigned DEFAULT '0',
	nutritionist int(11) unsigned DEFAULT '0'

);
