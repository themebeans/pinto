# Pinto WordPress Theme

Pinto is a delicate & delightfully lightweight theme built for writers, journalists & photographers. It's a seductively minimal WordPress theme that takes just minutes to get running.

## IndieWeb friendly

This theme includes support for microformats version 2 out of the box for use on the [IndieWeb](https://indieweb.org/).

- [h-entry](http://microformats.org/wiki/h-entry)
- [h-feed](http://microformats.org/wiki/h-feed)
- [h-card](http://microformats.org/wiki/h-card) in header
- [h-cite](http://microformats.org/wiki/h-cite) for comments

## Development

1. Clone this GitHub repository.
2. Browse to the folder in the command line.
3. Run the `npm install` command to install the theme's development dependencies within a /node_modules/ folder.
4. Add an environment.json to the theme root directory with a key of `devURL` and a value of your local install.

Example:

```
{
    "devURL": "http://demo.dev/pinto"
}
```

4. Run the `npm start` command for development.
5. Run the `build` gulp task to process build files and generate a zip.

## Support

[GoDaddy has acquired ThemeBeans](https://richtabor.com/?p=907), and in the spirit of open source — the entire ThemeBeans WordPress theme catalog is now freely available here on GitHub. However, **theme support and remote updates are only available for current license holders**, and up to April 9th, 2020.
