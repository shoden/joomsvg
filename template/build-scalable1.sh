#!/bin/bash

TMPL="scalable1"

[ -d $TMPL ] || exit 1

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

