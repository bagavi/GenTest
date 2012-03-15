<?php
$wgHooks['UserLogin'][] = array('ldapLogin', $ldapServer);
 
$ldap['server'] = "ldaps://ldap.company.com/";
$ldap['port'] = 3128;
 
function ldapLogin( $username, $password ) {
        global $ldap;
        $auth_user = "uid=" . $username 
        if( $connect = ldap_connect( $ldap['server'], $ldap['port'] ) ){ #ldap_connetc and ladp_bind and functions in php
                if( $bind = ldap_bind( $connect, $auth_user, $password ) ){
                        ldap_close( $connect );
                        return true;
                } else { // if bound to ldap
                        echo 'Error on ldap_bind';
                }
        } else { // if connected to ldap
                echo 'Error on ldap_connect';
        }
        ldap_close( $connect );
        wfRestoreWarnings();
        return false;
}


