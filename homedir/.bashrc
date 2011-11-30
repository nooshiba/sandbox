## .bashrc
## Naoto Ohshiba(2011.11.30)
##
# PATH
export PATH=$PATH:$HOME/bin:/usr/sbin

# permission
umask 022

# language
export LANG="ja_JP.UTF-8"
export OUTPUT_CHARSET="UTF-8"
export LC_ALL="C"
export LC_MESSAGES="C"
export JLESSCHARSET="ja"

# prompt
PS1='\[\033[01;32m\]\u@\h\[\033[01;34m\] \w \$\[\033[00m\] '

## subversion
export SVNROOT=""
if [ `which vim` ]; then
    export SVN_EDITOR=vim
fi


# pager
export PAGER=less
#export LESS='-X -i -P ?f%f:(stdin). ?lb%lb?L/%L.. [?eEOF:?pb%pb\%..]'
#export JLESSCHARSET=japanese-ujis
export LESSCHARSET=utf-8
export LV="-Ou8"
export LESSOPEN='|nkf -w %s'

# phing
#export PHING_HOME=/home/y/share/pear/phing
#export PHP_CLASSPATH=.:$PHING_HOME/classes

# ls
export LSCOLORS=ExFxCxdxBxegedabagacad

# python
export PYTHON_PATH=`which python`

#--------------------------------------------------
# alias
#--------------------------------------------------
# vim_jp
if [ `which vim` ]; then
    alias vi=vim
fi


# screen
#if [ `which screen` ]; then
#    alias screen='screen -U -D -RR'
#fi

# apache log.
alias al='tail -f /var/log/apache2/access_log'
alias el='tail -f /var/log/apache2/error_log'


# jless
#if [ `which jless` ]; then
#    alias less='jless'
#fi


#--------------------------------------------------
# support
#--------------------------------------------------
#exec cdhist
. ./bin/cdhist.sh

# screen
case "${TERM}" in
    'xterm'|'kterm'|'Eterm'|'dtterm'|'rxvt'|'vt100')
    if [ -x /usr/bin/screen ]; then
        exec screen -U
    fi
    ;;
esac
