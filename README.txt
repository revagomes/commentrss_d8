Drupal commentrss.module README.txt
==============================================================================

This module adds comment RSS serving capabilties to Drupal. These feeds are
suitable for some tracking of comments for your users. The module adds
feeds for the following:

  - complete site feed               /crss
  - per vocabulary feeds         eg. /crss/vocab/13
  - per term feeds               eg. /crss/term/14
  - per node feeds               eg. /crss/node/12
  - per node type feeds          eg. /crss/nodetype/story
  
This module might also be handy as an alternative to subscriptions, since
your users don't need to provide their email addresses, but still can follow
discussion on forums and other nodes. Due to the limited capabilities of RSS,
threading and such is not preserved, the comments are listed in reversed
time order.

Note that this module can optionaly work with vocabulary_list.module in 
order to print channel links in vocabulary listing feeds, since this type 
of service is not provided by Drupal core. You don't need to install
vocabulary_list.module to use commentrss though.

Per node type listing pages are not available in Drupal in any known
custom module, so there are no direct channel links printed in that case.

Installation
------------------------------------------------------------------------------
 
 Required:
  - Copy the module files to modules/
  - Enable the module as usual from Drupal's admin pages.
  
 Optional (if you would like to have nice vocabulary links in feeds):
  - Get vocabulary_list module and install as documented
 
Credits / Contact
------------------------------------------------------------------------------

This module was created by Gabor Hojtsy (goba[at]php.net), who is also
the active maintainer. Moshe Weitzman provided several fixes and improvements.

TODO
------------------------------------------------------------------------------

 - Either export a block with an XML/RSS button or try to hook into the
   syndication block provided by Drupal core or hook up with syndication
   module
