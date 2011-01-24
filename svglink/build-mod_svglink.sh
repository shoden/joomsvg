#!/bin/bash

MOD="mod_svglink"

[ -d $MOD ] || exit 1

VER=$(cat $MOD/$MOD.xml \
    | grep -re "<version>" \
    | sed 's/<version>\(.*\)<\/version>/\1/g' \
    | sed 's/\ //g')
ZIP=$MOD"-"$VER".zip"
if [ -f $ZIP ]; then
  echo "Eliminando" $ZIP"..."
  rm -f $ZIP
fi

echo "Creando" $ZIP"..."
zip -r $ZIP $MOD

exit 0

