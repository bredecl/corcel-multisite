
**A collection of Model classes that allows you to get data directly from a WordPress database.**

NOW with Multi Site Support

This package keeps all the work from the original [jgrossi/Corcel](https://github.com/corcel/corcel/) but extends it to support [WordPress Multisite](https://developer.wordpress.org/advanced-administration/multisite/).

## New functionalities

**NOTE**

In WordPress the Table where the sites are located is called `blogs` instead of `sites`, and the `sites` table contains the definition of the main container of blogs.

### Blog

List all blogs from the connections

```php
use Corcel\Model\Blog;
[...]
$blogs = Blog::get();
```

### Blog Options


```php
use Corcel\Model\Blog;
[...]
$blogs = Blog::get();
foreach($blogs as $blog){
    $data = $blog->options();
    dump($data);
    dump($data->where("option_name", "siteurl")->first());
    /// ...etc
}
```

## <a id="license"></a> Licence

  

[MIT License](http://jgrossi.mit-license.org/) © Junior Grossi
[MIT License](http://jgrossi.mit-license.org/) copyleft - Brede Basualdo Serraino