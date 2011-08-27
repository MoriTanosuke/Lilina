About
=====

Lilina is an open source feed aggregator, or feed reader, written in PHP. It doesn't require any PEAR or PECL packages and is simple to set up and use.
This software is Open Source Initiative approved Open Source Software. Open Source Initiative Approved is a trademark of the Open Source Initiative.

Requirements
============

* A webserver, like Apache or IIS
* PHP 5.2+
* The <a href="http://php.net/xml">XML entension</a>
* Support for <a href="http://php.net/pcre">PCRE</a>
* Either:
** The <a href="http://php.net/mbstring">mbstring</a> extension <strong>or</strong>
** The <a href="http://php.net/iconv">iconv</a> extension
* Either:
* Support for socket connections (see <a href="http://php.net/manual/en/function.fsockopen.php">the PHP manual entry on fsockopen</a>) <strong>or</strong>
* The cURL extension (see <a href="http://au.php.net/curl">the PHP manual entry on cURL</a>)

That's it! No PEAR packages are needed and no MySQL, PostgreSQL or SQLite databases are needed. Lilina is fully self-contained and uses flat-files instead of databases.

Installation
============

Upload to your server and then simply open up <code>install.php</code> in your browser.

Permissions
-----------

To use Lilina, you will need to make sure that your <code>content/system/</code> directory and all subdirectories are writable. You can set the proper permissions using:

    chmod -R 0755 content/system

If that does not work, you will need to give the folder world writable permissions. This is not recommended as it is then possible for anyone to edit your files. You can set it by executing:

    chmod -R 0777 content/system

If you use a graphical FTP client, you can also set it on each folder using the number 755 or 777, or giving read and execute permissions to all and the write permission to the owner only

Support
=======

Support is available from the <a href="http://getlilina.org/docs/support">Lilina support page</a>, <a href="http://getlilina.org/forums/">the Lilina forums</a> or <a href="http://getlilina.org/docs/">on the Lilina wiki</a>.

Copyright
=========

Lilina is released under the <abbr title="GNU Public License">GPL</abbr> (see <code>license.txt</code>).

Code from the following projects is used in Lilina:

* <a href="http://htmlpurifier.org/">HTMLPurifier</a> by Edward Z. Yang
* <a href="http://jquery.org/">jQuery</a> by John Resig
* PHP-gettext by Danilo Segan, Nico Kaiser and Steven Armstrong
* The Pomo library (part of <a href="http://glotpress.org/">GlotPress</a>) by Nikolay Bachiyski
* <a href="http://simplepie.org/">SimplePie</a> by Ryan Parman, Geoffery Sneddon and the SimplePie development team
