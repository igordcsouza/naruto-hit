#!/usr/bin/bash
 
#Variables
sr="localhost"                    #remote server
lg="narutohit"     #login name
pw="1004lean"                        #password
hs="all"                          #file name to store sql file
bk="$HOME/dbackup"                #path to store backup files
nw=$(date "+%Y%m%d")              #get date as string
nb=60                             #maximum number of files that will be keep

function backup()
{
  echo "Getting data from mysql server"
  mysqldump -u$lg -p$pw -h$sr --add-drop-table --quote-names --all-databases --add-drop-database > "$HOME/$hs.sql"
  echo "Compressing $fn.sql.gz file ..."
  gzip -f "$HOME/"$fn.sql
  if [ -d $bk ]; then
    continue
  else
    mkdir $bk
  fi
  cp -f "$HOME/"$hs.sql.gz "$bk/$nw.sql.gz"
 
  a=0
  b=$(ls -t $bk)
  c=$nb
 
  for arq in $b; do
    a=$(($a+1))
    if [ "$a" -gt $c ];  then
      rm -f "$bk/$arq"
    fi
  done
}

mysqldump -u$lg -p$pw -h$sr --add-drop-table --quote-names --all-databases --add-

gzip -f "$HOME/"$fn.sql

if [ -d $bk ]; then
  continue
else
  mkdir $bk
fi

 cp -f "$HOME/"$hs.sql.gz "$bk/$nw.sql.gz"

a=0
b=$(ls -t $bk)
c=$nb
for arq in $b; do
  a=$(($a+1))
  if [ "$a" -gt $c ];  then
      rm -f "$bk/$arq"
  fi
done

backup