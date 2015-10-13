CREATE TABLE IF NOT EXISTS `LogError` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `type` varchar(10) NOT NULL,
    `file` varchar(255) NOT NULL,
    `msg` varchar(255) NOT NULL,
    `line` int(11) NOT NULL,
    `column` int(11) NOT NULL,
    `trace` varchar(255) NOT NULL,
    `url` varchar(255) NOT NULL,
    `useragent` varchar(255) NOT NULL,
    `session` varchar(255) NOT NULL,
    `date` datetime NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0;
