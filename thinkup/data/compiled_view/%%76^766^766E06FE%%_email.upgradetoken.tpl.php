<?php /* Smarty version 2.6.26, created on 2014-10-18 14:39:46
         compiled from _email.upgradetoken.tpl */ ?>
Looks like you're upgrading your ThinkUp installation. Great! To complete the process, click on this link to apply new database updates:

<?php echo $this->_tpl_vars['application_url']; ?>
install/upgrade-database.php?upgrade_token=<?php echo $this->_tpl_vars['token']; ?>
 

If you have trouble, get in touch with the ThinkUp community on the mailing list:

http://groups.google.com/group/thinkupapp

Or drop by our IRC channel #thinkup on irc.freenode.net.


Thanks for using ThinkUp.

http://thinkup.com