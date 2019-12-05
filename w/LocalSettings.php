<?php
# This file was automatically generated by the MediaWiki 1.35.0-alpha
# installer. If you make manual changes, please keep track in case you
# need to recreate them later.
#
# See includes/DefaultSettings.php for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.
#
# Further documentation for configuration settings may be found at:
# https://www.mediawiki.org/wiki/Manual:Configuration_settings

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}


## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

$wgSitename = "Aesl";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs
## (like /w/index.php/Page_title to /wiki/Page_title) please see:
## https://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath = "/w";
$wgArticlePath = "/wiki/$1";
$wgUsePathInfo = true;
$wgScriptExtension = ".php";

## The protocol and server name to use in fully-qualified URLs
$wgServer = "http://aesl.herokuapp.com";

## The URL path to static resources (images, scripts, etc.)
$wgResourceBasePath = $wgScriptPath;

## The URL path to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogo = "$wgResourceBasePath/resources/assets/aesl.png";

## UPO means: this is also a user preference option

$wgEnableEmail = true;
$wgEnableUserEmail = false; # UPO

$wgEmergencyContact = "aesl@sosly.org";
$wgPasswordSender = "aesl@sosly.org";

$wgEnotifUserTalk = true; # UPO
$wgEnotifWatchlist = true; # UPO
$wgEmailAuthentication = true;

## Database settings
$url = parse_url(getenv("DATABASE_URL"));

$wgDBtype = $url["scheme"];
$wgDBserver = $url["host"];
$wgDBname = substr($url["path"], 1);
$wgDBuser = $url["user"];
$wgDBpassword = $url["pass"];

# Postgres specific settings
$wgDBport = "5432";
$wgDBmwschema = "mediawiki";

## Shared memory settings
$wgMainCacheType = CACHE_NONE;
$wgMemCachedServers = [];

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads = true;
$wgUseImageMagick = true;
$wgImageMagickConvertCommand = "/usr/bin/convert";

# InstantCommons allows wiki to use images from https://commons.wikimedia.org
$wgUseInstantCommons = false;

# Periodically send a pingback to https://www.mediawiki.org/ with basic data
# about this MediaWiki instance. The Wikimedia Foundation shares this data
# with MediaWiki developers to help guide future development efforts.
$wgPingback = false;

## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale
$wgShellLocale = "C.UTF-8";

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publicly accessible from the web.
#$wgCacheDirectory = "$IP/cache";

# Site language code, should be one of the list in ./languages/data/Names.php
$wgLanguageCode = "en";

$wgSecretKey = getenv("SECRET_KEY");

# Changing this will log out all existing sessions.
$wgAuthenticationTokenVersion = "1";

# Site upgrade key. Must be set to a string (default provided) to turn on the
# web installer while LocalSettings.php is in place
$wgUpgradeKey = getenv("UPGRADE_KEY");

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "http://creativecommons.org/licenses/by-nc-nd/4.0/";
$wgRightsText = "Attribution-NonCommercial-NoDerivatives 4.0 International";
$wgRightsIcon = "https://i.creativecommons.org/l/by-nc-nd/4.0/88x31.png";

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'vector', 'monobook':
$wgDefaultSkin = "vector";

# End of automatically generated settings.
# Add more configuration options below.

#######################################
## Skins
#######################################

## Vector Skin
wfLoadSkin( 'Vector' );
$wgVectorResponsive = false;

#######################################
## Extensions
#######################################

## ApprovedRevs
wfLoadExtension( 'ApprovedRevs' );

$egApprovedRevsAutomaticApprovals = false;
$egApprovedRevsShowNotApprovedMessage = true;

$egApprovedRevsSelfOwnedNamespaces = array( NS_USER );

## AWS
wfLoadExtension( 'AWS' );

$wgAWSCredentials = [
     "key" => getenv("AWS_ACCESS_KEY"),
     "secret" => getenv("AWS_SECRET_KEY"),
     "token" => false
];

$wgAWSRegion = "us-west-1";
$wgAWSBucketName = "sosly.aesl";

$wgFileBackends['s3']['containerPaths'] = array(
     'wiki_id-local-public' => 'sosly.aesl',
     'wiki_id-local-thumb' => 'sosly.aesl',
     'wiki_id-local-deleted' => 'sosly.aesl',
     'wiki_id-local-temp' => 'sosly.aesl'
 );
 
// Make MediaWiki use Amazon S3 for file storage.
$wgLocalFileRepo = array (
     'class'             => 'LocalRepo',
     'name'              => 'local',
     'backend'           => 'AmazonS3',
     'scriptDirUrl'      => $wgScriptPath,
     'scriptExtension'   => $wgScriptExtension,
     'url'               => $wgScriptPath . '/img_auth.php',
     'zones'             => array(
         'public'  => array( 'url' => 'http://sosly.aesl.s3-eu-west-1.amazonaws.com/public' ),
         'thumb'   => array( 'url' => 'http://sosly.aesl.s3-eu-west-1.amazonaws.com/thumb' ),
         'temp'    => array( 'url' => 'http://sosly.aesl.s3-eu-west-1.amazonaws.com/temp' ),
         'deleted' => array( 'url' => 'http://sosly.aesl.s3-eu-west-1.amazonaws.com/deleted' )
     )
 );

## CategoryTree
wfLoadExtension( 'CategoryTree' );

## Cite
wfLoadExtension( 'Cite' );
$wgCiteCacheRawReferencesOnParse = true;
$wgCiteStoreReferencesData = true;

## CiteThisPage
wfLoadExtension( 'CiteThisPage' );

## CSS
wfLoadExtension( 'CSS' );

## Loops
require_once( "$IP/extensions/Loops/Loops.php" );

## Markdown
require_once("$IP/extensions/Markdown/Markdown.php");

## MultimediaViewer
wfLoadExtension( 'MultimediaViewer' );

## ParserFunctions
wfLoadExtension( 'ParserFunctions' );
$wgPFEnableStringFunctions = true;

## ReplaceText
wfLoadExtension( 'ReplaceText' );
$wgGroupPermissions['bureaucrat']['replacetext'] = true;

## SpamBlacklist
wfLoadExtension( 'SpamBlacklist' );
$wgBlacklistSettings = [
	'spam' => [
		'files' => [
			"https://meta.wikimedia.org/w/index.php?title=Spam_blacklist&action=raw&sb_ver=1",
			"https://en.wikipedia.org/w/index.php?title=MediaWiki:Spam-blacklist&action=raw&sb_ver=1"
		],
	],
];

## TitleBlacklist
wfLoadExtension( 'TitleBlacklist' );
$wgGroupPermissions['sysop']['tboverride'] = false;
$wgTitleBlacklistSources = array(
    array(
         'type' => 'localpage',
         'src'  => 'MediaWiki:Titleblacklist',
    ),
    array(
         'type' => 'url',
         'src'  => 'https://meta.wikimedia.org/w/index.php?title=Title_blacklist&action=raw',
    ),
);

## Variables
wfLoadExtension( 'Variables' );

#######################################
## Exceptions
#######################################
$wgShowExceptionDetails = true;
$wgShowDBErrorBacktrace = true;
$wgShowSQLErrors = true;
