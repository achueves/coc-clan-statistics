# coc-clan-statistics

This project was origianally created for gathering of data from Clash of Clans for storage in a database.
This data can then be used to calculate statistics about how all players are performing in war.

The scripts are supposed to run from the CLI using PHP.

After building the scripts I continued to write code to dynamically present the data on web pages.
Initially the plan was to be using AngularJS but it was a bit tricky so I switched over to PHP.

Usage:
./update_clan.php clanid=#m42k43j
./update_war.php clanid=#m42k43j
./update_members.php clantag=#m42k43j

The above example commands should be run from crontab. I run them with different frequency.
For example the clan and it's membbers might only need to be updated once per day.
But the clan war need to updated as often as possible to get all data stored.

If you are using my tools and included web pages. Please share your ideas of what is needed to be improved.
Also please let me add your site as an example site below.

Installation:
1. Create a database in MySQL.
2. Import the sql-scripts to your mysql database.
3. Configure your mysql settings in the mysql_coc.php file.
4. Set up your options in the config.php file.
5. Modify the text in site_php/lang.XX.php to match your choice.
6. Get a API-token from https://developer.clashofclans.com
7. Add this API-token to the token.php file.
8. Run the update scripts from the command line.
9. See the statistics show up on your new web site.

Example site: http://aktivavikingar.servegame.com/statistik

