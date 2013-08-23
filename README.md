CssCompressor
=============

A PHP script that compresses CSS on the fly. The compressed stylesheets are then cached and stored in a file. The next time that the CSS is loaded, instead of compressing it again, the script will forward the cached contents. The script checks if the original file has been updated. If so, it will compress and cache a new file. I created this script in order to use it in combination with a .htaccess REWRITE rules to compress every single stylesheet in my website.