Drupal commentrss.module README
==============================================================================

This module adds comment RSS serving capabilties to Drupal, which is
suitable for some tracking of comments for your users. The module adds
feeds for the following points:

  - complete site feed
  - per vocabulary feeds
  - per term feeds
  - per node feeds
  
This module might also be handy as an alternative to subscriptions, since
your users don't need to provide their email addresses, but still can follow
discussion on forums and other nodes. Due to the limited capabilities of RSS,
threading and such is not preserved, the comments are listed in reversed
time order.

Note that this module needs vocabulary_list.module in order to not print
broken links to vocabulary listing pages, since this type of service is
not provided by Drupal core.

This module does not provide automatic links to the comment feeds anywhere,
neither in the HTML head, nor on the user interface. Suggestions are welcome!
  
Installation
------------------------------------------------------------------------------
 
 Required:
  - Copy commentrss.module to modules/
  - Enable the module as usual from Drupal's admin pages.
  
 Required (if you would not like to have broken vocabulary links in feeds):
  - Get vocabulary_list module and install as documented
 
Credits / Contact
------------------------------------------------------------------------------

This module was created by Gabor Hojtsy (goba[at]php.net), who is also
the active maintainer.

TODO
------------------------------------------------------------------------------

 - Put <link> tags into the HTML output if the user is on a page for which
   we provide RSS feeds
 - Either export a block with az XML/RSS button or try to hook into the
   syndication block provided by Drupal core