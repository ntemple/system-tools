# system-tools
Server and system maintenance tools.

## Mysql Hourly Backups

* ensure root/.my.cnf has necessary user credentials
* move /etc/cron.daily/logrotate to /etc/cron.hourly (to run logrotate hourly)
* mkdir -p /backups/mysql
* move mysqlbackup.sh to /root
* move logrotate.d-mysqlbackup to /etc/logrotate.d/mysqlbackup
* flavor to taste

Test: logrotate --force /etc/logrotate.d/mysqlbackup

### TODO
Working on using Percona xtrabackup for incremental hot backups without locking the tables.
See: https://www.digitalocean.com/community/tutorials/how-to-configure-mysql-backups-with-percona-xtrabackup-on-ubuntu-16-04
(and other documentation)

### Improvements
This could be massively improved by creating a backup user on the filesystem and in the mysql database, and using that user instead.

