#!/bin/sh
wget https://repo.percona.com/apt/percona-release_latest.$(lsb_release -sc)_all.deb
dpkg -i percona-release_latest.$(lsb_release -sc)_all.deb
percona-release enable-only tools
apt-get update
apt-get install percona-xtrabackup-80
apt-get install qpress

