St-Joris Turnhout, Website
===============================
[![Latest Version](https://img.shields.io/github/tag/Tjoosten/sijot-1.svg?style=flat&label=release)](https://github.com/tjoosten/sijot-1/tags)
[![devDependency Status](https://david-dm.org/tjoosten/sijot-1/dev-status.svg)](https://david-dm.org/tjoosten/sijot-1#info=devDependencies)
[![Dependency Status](https://david-dm.org/tjoosten/sijot-1.svg)](https://david-dm.org/tjoosten/sijot-1)

This is the website for the scouting group, St-Joris Turnhout. Located in Belguim.
This is an active development branch. So plz don't use it for your own website. Because there is a
higly risk of software bugs.


### API

There is a background api for the developers of this site. 

## Gulp asset manager:

### Install:

- Download or clone the repo with `git clone`.
- Check if nodeJS is installed. *(you can check it with `node -v`).*
- Run `npm install`.
- test it by navigating to the source folder and run `gulp`.
- Celebrate.

You can read the full documentation over [here]().

### Quickstart Gulp commands:

The following commands are available in the asset manager. <br>
For the flags just run `gulp help` they are documented:

| Command:             | Description:                                    |
| :------------------- | :---------------------------------------------- |
| `gulp help`          | Display the help text.                          |
| `gulp compile`       | Compile all the LESS ans JS resources.          |
| `gulp compile-js`    | Compile all the JS resources.                   |
| `gulp compile-less`  | Compile all the LESS resources.                 |
| `gulp copy-fonts`    | Copy the fonts to the asset directory.          |
| `gulp copy-img`      | Copy the image files to the asset directory.    |
| `gulp default`       | Gulps default task. Will output the help page.  |
| `gulp lint`          | Validate all the JS and LESS files.             |
| `gulp lint-js`       | Validate all the JS resources.                  |
| `gulp lint-less`     | Validate all the LESS resources.                |

## License
This files are placed under the MIT License.
