#!/bin/bash
#(C) brain project

LANG=C

cmddir=`dirname $0`
cmdname=`basename $0`
newtmpdir=`mktemp -d /tmp/$cmdname.XXXXXX`
mkdir -p "${newtmpdir}" 
buffer="$newtmpdir/buffer"
phpcli=`which php`

function usage() {
cat <<EOF 
USAGE: $cmddir/$cmdname application environment

* Backend path is optional.

example $cmddir/$cmdname rgp production $HOME/backend

Enjoy!
EOF
} 

if [ "$1" = "-h" ]
        then
                usage
                exit 0
fi

if [ "$1" = "--help" ]
        then
                usage
                exit 0
fi  

if [ "$1" = "" ]
        then
                usage
                exit 1
	else
		application=$1
fi

if [ "$2" = "" ]
        then
                usage
                exit 1
        else
                environment=$2
fi

if [ "$3" = "" ]
        then
                backend_path="${HOME}/backend"
        else
                backend_path=$3
fi

function cleanup () {
        rm -rf "$newtmpdir"
}

trap 'cleanup' EXIT
trap 'cleanup' SIGTERM

touch $HOME/.bashrc
grep -v "#brain_stuff#" $HOME/.bashrc > $buffer

cat $buffer > $HOME/.profile
cat >> $HOME/.profile <<EOF 
#brain application stuff begin.         #brain_stuff#
export PATH="\${PATH}:${backend_path}/applications/${application}/${environment}/bin:${HOME}/backend/bin" #brain_stuff#
export PHING_HOME="${backend_path}/applications/${application}/${environment}/libraries/classes/manual/phing"  #brain_stuff#
export PROPEL_GEN_HOME="${backend_path}/applications/${application}/${environment}/libraries/classes/manual/propel/generator"  #brain_stuff#
export LANG=en_US.UTF-8 #brain_stuff#
#brain application stuff end.           #brain_stuff#
EOF

#eval the new path
. $HOME/.profile

echo "please install dig and awk: sudo apt-get install dns-browse awk";
