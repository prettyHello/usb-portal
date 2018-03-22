#!/bin/bash

slappasswd -s test123

service slapd stop

rm -Rf /etc/ldap
cp -Rvf /vagrant/ldap/etc /etc/ldap

rm -Rf /var/lib/ldap
cp -Rvf /vagrant/ldap/var_lib /var/lib/ldap

rm -Rf /etc/ldapscripts
cp -Rvf /vagrant/ldap/ldapscripts /etc/ldapscripts

sudo chown -R openldap /etc/ldap
sudo chown -R openldap /var/lib/ldap

service slapd start


## https://www.digitalocean.com/community/tutorials/how-to-use-ldif-files-to-make-changes-to-an-openldap-system
ldapadd -x -D "cn=admin,dc=example,dc=org" -w test123 -H ldap:// -f /vagrant/ldap/ldap_create_ous.ldif

## add a test user and group
ldapaddgroup test
ldapadduser test test
ldapsetpasswd test test
