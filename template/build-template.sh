#!/bin/bash

[ $# -gt 0 ] || exit 1
[ -d $1    ] || exit 1

TMPL=$1
VER=$(cat $TMPL/templateDetails.xml \
    | grep -re "<version>" \
    | sed 's/<version>\(.*\)<\/version>/\1/g' \
    | sed 's/\ //g')
ZIP=$TMPL"-"$VER".zip"
if [ -f $ZIP ]; then
  echo "Eliminando" $ZIP"..."
  rm -f $ZIP
fi

echo "Creando" $ZIP"..."
zip -r $ZIP $TMPL

exit 0

