var gulp = require('gulp');
var notifier = require('node-notifier');
var marked = require('marked');
var util = require('gulp-util');
var Filehound = require('filehound');
var fs = require('fs');
var basename = require('basename');

var dirs = {
    input: 'docs',
    output: 'examples' 
};

function standardHandler(err) {
  notifier.notify({
    title: 'Gulp error',
    message: err.message || err
  });
  util.log(util.colors.red('Error'), err.message, err.lineNumber || err);
}

gulp.task('default', ['buildexamples'], function() {
    
});

gulp.task('buildexamples', function() {
    
    if (fs.existsSync(dirs.input + '/sitemap.md')) {
        fs.unlink(dirs.input + '/sitemap.md');
    }
    
    Filehound.create().ext(
        'md'
    ).paths(
        dirs.input
    ).find(function(err, files) {
        if (err) {
            standardHandler(err);
        }
        
        var getPhpFileName = function(file) {
            var filename = basename(file);
            var dir = file.split('/');
            dir.shift();
            dir.pop();
            
            var dest = ['examples'];
            dest = dest.concat(dir);
            dest.push(filename + '.php');
            
            return dest.join('/');
        };
        
        var sitemap = [];
        
        console.log(files);
        
        function writeFile(files, index) {
            if (files[index]) {
                var file = files[index];
                fs.readFile(file, "utf-8", function(err, _data) {
                    var tokens = marked.lexer(_data, {});
                    var afterfirstheader = false;
                    var codemode = false;
                    var header = [];
                    var code = [];
                    var dir = file.split('/');
                    dir.shift();
                    var filename = dir.pop();
                    tokens.forEach(function(token, i) {
                        // Find the subsequent paragraphs in the first heading
                        if (token 
                            && token.type
                            && token.type === 'heading'
                        ) {
                            var k = i + 1;
                            
                            if (!afterfirstheader) {
                                header.push('@name ' + token.text);
                                header.push('');
                                if (dir.length > 0) {
                                    sitemap.push({
                                        title: token.text,
                                        directory: dir.join('/'),
                                        filename: filename
                                    });
                                }
                            } else {
                                header.push(token.text);
                                header.push('');
                                afterfirstheader = true;
                            }
                            
                            var check = function(index) {
                                return (tokens[index] 
                                    && tokens[index].type === 'paragraph'
                                    && tokens[index].text.substring(0, 3) !== '```'
                                );
                            };
                            
                            if (check(k)) {
                                while (check(k)) {
                                    header.push(tokens[k].text);
                                    k++;
                                    if (check(k)) {
                                        header.push('');
                                    }
                                }
                            }
                        }
                        
                        if (token 
                            && token.text
                            && token.text.substring(0, 3) === '```'
                        ) {
                            if (!codemode) {
                                codemode = true;
                            } else {
                                codemode = false;
                            }
                        }
                        
                        if (codemode && token.text) {
                            var c = token.text.split('\n');
                            for (var i = c.length-1; i >= 0; i--) {
                                if (c[i] === '```') {
                                    c.splice(i, 1);
                                }
                                if (c[i] === '```php') {
                                    c.splice(i, 1);
                                }
                            }
                            code = code.concat(c);
                        }
                    });

                    if (header.length > 0 && code.length > 0) {
                        // Create new file
                        var phpfile = getPhpFileName(file);

                        console.log('Creating', phpfile);
                        var lines = ['<?php', '', '/**'];
                        header.forEach(function(l) {
                            lines.push(' * ' + l);
                        });
                        lines.push(' */');
                        lines.push('');
                        lines.push('require_once __DIR__ . \'/' + '../'.repeat(dir.length) + 'creating-a-new-connection.php\';');
                        lines.push('');
                        code.forEach(function(c) {
                            lines.push(c);
                        });
                        lines.push('');
                        lines.push('require_once __DIR__ . \'/' + '../'.repeat(dir.length) + 'finally.php\';');                        
                        fs.writeFileSync(phpfile, lines.join("\n"));
                    }
                    writeFile(files, index + 1);
                });
            } else {
                // Create a sitemap markdown file
                var p = ['# Sitemap'];
                p.push('');
                p.push('');
                p.push('## Getting started');
                p.push(' * [index.html] Introduction - READ ME first!');
                var last = '';
                for (var i in sitemap) {
                    if (last != sitemap[i].directory) {
                        console.log(last, sitemap[i].directory);
                        p.push('');
                        p.push('');
                        p.push('## ' + sitemap[i].directory + ' examples');
                    }
                    last = sitemap[i].directory;
                    
                    p.push(' * [' + sitemap[i].directory + '/' + sitemap[i].filename.split('.').shift() + '.html] ' + sitemap[i].title);
                }
                fs.writeFileSync(dirs.input + '/sitemap.md', p.join('\n'));
            }
        }
        
        writeFile(files, 0);
    });
});