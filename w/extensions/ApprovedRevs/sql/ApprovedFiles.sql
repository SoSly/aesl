CREATE TABLE /*_*/mediawiki.approved_revs_files (
	file_title bit varying(2040) NOT NULL,
	approved_timestamp bit(112) NOT NULL,
	approved_sha1 bit varying(256) NOT NULL
) /*$wgDBTableOptions*/;

CREATE UNIQUE INDEX approved_revs_file_title ON /*_*/mediawiki.approved_revs_files (file_title);
