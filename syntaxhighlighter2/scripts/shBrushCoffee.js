/*
 By Rod Vagg <rod@vagg.org> / @rvagg / http://rod.vagg.org
 Released under the do-what-you-like-,-attribution-would-be-nice-,-but-please-don't-pass-off-as-your-own-work licence.
 */SyntaxHighlighter.brushes.CoffeeScript = function() {
    var csKeywords, jsKeywords, keywords;
    jsKeywords = 'if else new return try catch finally throw break continue for in while delete instanceof typeof switch super extends class case default do function var void with const let debugger enum export import native __extends __hasProp';
    csKeywords = 'then unless and or is isnt not of by where when until';
    keywords = jsKeywords + ' ' + csKeywords;
    this.regexList = [
        {
            regex: SyntaxHighlighter.regexLib.singleLinePerlComments,
            css: 'comments'
        }, {
            regex: /\#\#\#[\s\S]*?\#\#\#/gm,
            css: 'comments'
        }, {
            regex: SyntaxHighlighter.regexLib.multiLineDoubleQuotedString,
            css: 'string'
        }, {
            regex: SyntaxHighlighter.regexLib.doubleQuotedString,
            css: 'string'
        }, {
            regex: SyntaxHighlighter.regexLib.singleQuotedString,
            css: 'string'
        }, {
            regex: /\'\'\'[\s\S]*?\'\'\'/gm,
            css: 'string'
        }, {
            regex: /\/\/\/[\s\S]*?\/\/\//gm,
            css: 'string'
        }, {
            regex: /\b([\d]+(\.[\d]+)?|0x[a-f0-9]+)\b/gmi,
            css: 'value'
        }, {
            regex: /(@[\w._]*|this[\w._]*)/g,
            css: 'variable bold'
        }, {
            regex: /(([\w._]+)::([\w._]*))/g,
            css: 'variable bold'
        }, {
            regex: /([\w._]+)\s*(?=\=)/g,
            css: 'variable bold'
        }, {
            regex: /(-&gt;|->|=&gt;|=>|===|==|=|>|&gt;|<|&lt;|\.\.\.|&&|&amp;&amp;|\|\||\!\!|\!|\+\+|\+|--|-|\[|\]|\(|\)|\{|\})|\?|\/|\*|\%/g,
            css: 'keyword'
        }, {
            regex: new RegExp(this.getKeywords(keywords), 'gm'),
            css: 'keyword'
        }
    ];
    return;
};
SyntaxHighlighter.brushes.CoffeeScript.prototype = new SyntaxHighlighter.Highlighter();
SyntaxHighlighter.brushes.CoffeeScript.aliases = ['coffeescript', 'CoffeeScript', 'coffee'];