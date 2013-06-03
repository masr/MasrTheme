SyntaxHighlighter.brushes.Vimrc = function()
{

	// created by Yann Duval 2009 - yann.duval@gmx.net
	
	var keywords = 
		'set if else endif map nmap syntax filetype version echo quit quit! has for augroup ' +
		'autocmd';
	
	var values =
		'ai autoindent nu number nonu nonumber nocp nocompatible on off tabstop foldmethod ' + 
		'showcmd showmode ruler hlsearch showmatch guioptions backup backspace cmdheight ' + 
		'comments completeopt encoding expandtab fillchars hidden history icon ignorecase ' +
		'incsearch laststatus lazyredraw linebreak listchars mouse printheader printoptions ' +
		'report scrolloff shiftwidth shortmess showbreak sidescroll smartcase smartindent ' +
		'softtabstop spelllang spellsuggest statusline switchbuf textwidth title titleold ' +
		'ttyfast whichwrap wildignore wildmenu wildmode wrap BufWritePost taglist setlocal';
	
	this.regexList = [
		{ regex: new RegExp('"(?:\\.|(\\\\\\")|[^\\""\\n])*', 'g'),	css: 'comments' },
		{ regex: SyntaxHighlighter.regexLib.doubleQuotedString,			css: 'string' },			// strings
		{ regex: new RegExp(this.getKeywords(keywords), 'gm'),			css: 'keyword' },
		{ regex: new RegExp(this.getKeywords(values), 'gm'),				css: 'value' }
		];
};

SyntaxHighlighter.brushes.Vimrc.prototype = new SyntaxHighlighter.Highlighter();
SyntaxHighlighter.brushes.Vimrc.aliases = ['vimrc'];

