# Atom Feed

A plugin that adds an [Atom Syndication Format](https://tools.ietf.org/html/rfc4287) feed to [Blundit - Flat-File CMS](https://github.com/bludit/bludit) powered websites. Tested and works with the [Bludit RSS Feed](https://github.com/bludit/bludit/tree/master/bl-plugins/rss) and [RSS Feed 2](https://github.com/erdifr/rss-feed-2) plugins.


More information about Atom Feeds [at this Wikipedia page](https://en.wikipedia.org/wiki/Atom_(Web_standard)).


## Requirements

- [Bludit](https://github.com/bludit/bludit) v3.8.1 - Not tested with any other version.


## Version History

  - v0.0.2

    1. Atom feed copyright now defaults to ```DISABLE```.

    2. Atom feed copyright settings menu now uses a ```select``` input.

    3. Atom feed item limit settings menu now uses a ```number``` input.

    4. Atom feed generator settings menu input now accepts ```À-ž``` characters.

    5. More information added to settings menu sections - on-screen and mouseover.

  - v0.0.1 - Initial version.


## Credit

All inspiration for this plugin came from the [Bludit RSS Feed](https://github.com/bludit/bludit/tree/master/bl-plugins/rss) plugin.


## License

Atom Feed is open source software licensed under the [MIT license](https://opensource.org/licenses/MIT).


## Example ```feed.atom``` File

```xml
<?xml version="1.0" encoding="utf-8"?>
<feed xmlns="http://www.w3.org/2005/Atom">
  <title>SiteTitle</title>
  <subtitle>SiteSlogan</subtitle>
  <id>tag:bludit.localdomain,2019-03-31:1640</id>
  <updated>2019-03-31T19:03:33-04:00</updated>
  <link href="http://bludit.localdomain/feed.atom" rel="self" type="application/atom+xml"/>
  <link href="http://bludit.localdomain" hreflang="en" rel="alternate" type="text/html"/>
  <rights>CC By-SA 4.0</rights>
  <generator>Bludit - Flat-File CMS</generator>
  <entry>
    <title>Category Page 004</title>
    <link href="http://bludit.localdomain/category-page-004" hreflang="en" rel="alternate"/>
    <id>tag:bludit.localdomain,2019-03-31:1640.251b3eca2d8056d4a027cc0ae91e7a38</id>
    <published>2019-03-30T18:32:22-04:00</published>
    <updated>2019-03-30T18:32:22-04:00</updated>
    <category scheme="http://bludit.localdomain/" term="General"/>
    <author>
      <name>admin</name>
    </author>
    <summary type="html">&lt;p&gt;Category Page 004&lt;/p&gt;
&lt;p&gt;Category: General&lt;/p&gt;
&lt;p&gt;Tags: none&lt;/p&gt;</summary>
  </entry>
  <entry>
    <title>No edit page 1743</title>
    <link href="http://bludit.localdomain/no-edit-page-1743" hreflang="en" rel="alternate"/>
    <id>tag:bludit.localdomain,2019-03-31:1640.75f484a936b64393f5adc0ec4e42c440</id>
    <published>2019-03-30T17:43:19-04:00</published>
    <updated>2019-03-30T17:43:19-04:00</updated>
    <author>
      <name>admin</name>
    </author>
    <summary type="html">&lt;p&gt;No edit page 17:43&lt;/p&gt;</summary>
  </entry>
  <entry>
    <title>New page - 1 edit 1735</title>
    <link href="http://bludit.localdomain/new-page-no-edits" hreflang="en" rel="alternate"/>
    <id>tag:bludit.localdomain,2019-03-31:1640.fea270cef356631bc4b355395742eba9</id>
    <published>2019-03-30T17:00:03-04:00</published>
    <updated>2019-03-30T17:35:59-04:00</updated>
    <author>
      <name>admin</name>
    </author>
    <summary type="html">&lt;p&gt;New page - no edits.&lt;/p&gt;</summary>
  </entry>
  <entry>
    <title>Sticky Page 001</title>
    <link href="http://bludit.localdomain/sticky-page-001" hreflang="en" rel="alternate"/>
    <id>tag:bludit.localdomain,2019-03-31:1640.0ad054420b9c17c4eb86ef40b84b6074</id>
    <published>2019-03-28T11:44:35-04:00</published>
    <updated>2019-03-28T11:44:35-04:00</updated>
    <author>
      <name>admin</name>
    </author>
    <summary type="html">&lt;p&gt;Sticky Page 001&lt;/p&gt;
&lt;p&gt;This page has no categor(y/ies).&lt;/p&gt;
&lt;p&gt;This page has no tag(s).&lt;/p&gt;</summary>
  </entry>
  <entry>
    <title>Static Page 001</title>
    <link href="http://bludit.localdomain/static-page-001" hreflang="en" rel="alternate"/>
    <id>tag:bludit.localdomain,2019-03-31:1640.6198eaa3d76cf01e8a68a2ae3778e412</id>
    <published>2019-03-28T11:43:34-04:00</published>
    <updated>2019-03-28T11:43:34-04:00</updated>
    <author>
      <name>admin</name>
    </author>
    <summary type="html">&lt;p&gt;Static Page 001&lt;/p&gt;
&lt;p&gt;This static page has no categor(y/ies).&lt;/p&gt;
&lt;p&gt;This static page has no tag(s).&lt;/p&gt;</summary>
  </entry>
  <entry>
    <title>Category Page 003</title>
    <link href="http://bludit.localdomain/category-page-003" hreflang="en" rel="alternate"/>
    <id>tag:bludit.localdomain,2019-03-31:1640.ecb19e68daa1b093f68859e11253d8b8</id>
    <published>2019-03-28T10:48:14-04:00</published>
    <updated>2019-03-29T12:38:20-04:00</updated>
    <category scheme="http://bludit.localdomain/" term="Videos"/>
    <author>
      <name>admin</name>
    </author>
    <summary type="html">&lt;p&gt;Category Page 003&lt;/p&gt;
&lt;p&gt;This page has category Videos.&lt;/p&gt;
&lt;p&gt;This page has no tag(s).&lt;/p&gt;</summary>
  </entry>
  <entry>
    <title>Category Page 002</title>
    <link href="http://bludit.localdomain/category-page-002" hreflang="en" rel="alternate"/>
    <id>tag:bludit.localdomain,2019-03-31:1640.18b1a8c1ada64aeb80f3a5d1ddba4da2</id>
    <published>2019-03-28T10:46:08-04:00</published>
    <updated>2019-03-29T12:39:34-04:00</updated>
    <category scheme="http://bludit.localdomain/" term="Music"/>
    <author>
      <name>admin</name>
    </author>
    <summary type="html">&lt;p&gt;Category Page 002&lt;/p&gt;
&lt;p&gt;This page has category Music.&lt;/p&gt;
&lt;p&gt;This page has no tag(s).&lt;/p&gt;</summary>
  </entry>
  <entry>
    <title>Category Page 001</title>
    <link href="http://bludit.localdomain/category-page-001" hreflang="en" rel="alternate"/>
    <id>tag:bludit.localdomain,2019-03-31:1640.75b36a386c0104abb5de4f22cb888bac</id>
    <published>2019-03-28T10:44:34-04:00</published>
    <updated>2019-03-28T10:44:34-04:00</updated>
    <category scheme="http://bludit.localdomain/" term="General"/>
    <author>
      <name>admin</name>
    </author>
    <summary type="html">&lt;p&gt;Category Page 001&lt;/p&gt;
&lt;p&gt;This page has category General.&lt;/p&gt;
&lt;p&gt;This page has no tag(s).&lt;/p&gt;</summary>
  </entry>
  <entry>
    <title>Tag Page 003</title>
    <link href="http://bludit.localdomain/tag-page-003" hreflang="en" rel="alternate"/>
    <id>tag:bludit.localdomain,2019-03-31:1640.aee9228eb420870a0a5548bd1832bab6</id>
    <published>2019-03-28T10:38:49-04:00</published>
    <updated>2019-03-28T10:48:05-04:00</updated>
    <author>
      <name>admin</name>
    </author>
    <summary type="html">&lt;p&gt;Tag Page 003&lt;/p&gt;
&lt;p&gt;This page has tags:&lt;/p&gt;
&lt;p&gt;tag02 tag04&lt;/p&gt;
&lt;p&gt;This page has no categor(y/ies).&lt;/p&gt;</summary>
  </entry>
  <entry>
    <title>Tag Page 002</title>
    <link href="http://bludit.localdomain/tag-page-002" hreflang="en" rel="alternate"/>
    <id>tag:bludit.localdomain,2019-03-31:1640.38654c53d9b7dbdab84f92f2e76f4e32</id>
    <published>2019-03-28T10:37:25-04:00</published>
    <updated>2019-03-28T10:47:52-04:00</updated>
    <author>
      <name>admin</name>
    </author>
    <summary type="html">&lt;p&gt;Tag Page 002&lt;/p&gt;
&lt;p&gt;This page has tags:&lt;/p&gt;
&lt;p&gt;tag01 tag03 tag 05&lt;/p&gt;
&lt;p&gt;This page has no categor(y/ies).&lt;/p&gt;</summary>
  </entry>
</feed>
```