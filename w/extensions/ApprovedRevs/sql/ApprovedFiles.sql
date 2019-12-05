CREATE TABLE /*_*/mediawiki.approved_revs_files (
	file_title text NOT NULL,
	approved_timestamp bit varying(112) NOT NULL,
	approved_sha1 bit varying(256) NOT NULL
) /*$wgDBTableOptions*/;

CREATE UNIQUE INDEX approved_revs_file_title ON /*_*/mediawiki.approved_revs_files (file_title);
