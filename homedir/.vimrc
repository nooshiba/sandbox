" color
syntax on

highlight LineNr ctermfg=darkyellow
highlight NonText ctermfg=darkgrey
highlight Folded ctermfg=blue
highlight SpecialKey cterm=underline ctermfg=darkgrey
"highlight SpecialKey ctermfg=grey

highlight ZenkakuSpace cterm=underline ctermfg=lightblue guibg=white
match ZenkakuSpace /　/

" TAB
set ts=4 sw=4
set softtabstop=4
set expandtab

" search
set ignorecase
set smartcase
set nohlsearch
set incsearch