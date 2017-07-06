CREATE TABLE `electores_nacional` (
  `nacionalidad` char(1) NOT NULL default 'V',
  `cedula` int(8) NOT NULL default '0',
  `primer_apellido` varchar(128) default '',
  `segundo_apellido` varchar(128) default '',
  `primer_nombre` varchar(128) default '',
  `segundo_nombre` varchar(128) default '',
  `cod_centro` int(50) default '0',
  PRIMARY KEY  (`nacionalidad`,`cedula`),
  UNIQUE KEY `idx_venezolano` (`nacionalidad`,`cedula`),
  KEY `idx_cedula` (`cedula`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 PACK_KEYS=1;


LOAD DATA LOCAL INFILE "C:/Users/kidcobain/Downloads/nacional/nacional/nacional.csv"
INTO TABLE electores_nacional
FIELDS TERMINATED BY ';' ENCLOSED BY ''
LINES STARTING BY '' TERMINATED BY '\n'
IGNORE 2 LINES
(nacionalidad, cedula, primer_apellido, segundo_apellido, primer_nombre, segundo_nombre, cod_centro);
# SET fecha_nac = DATE_FORMAT(@fecha_tmp, ‘%Y-%m-%d’)
# --enable-local-infile