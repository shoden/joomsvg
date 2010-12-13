#!/bin/bash

COM="com_svgmenu"

[ -d $COM ] || exit 1

VER=$(cat $COM/$COM.xml \
    | grep -re "<version>" \
    | sed 's/<version>\(.*\)<\/version>/\1/g' \
    | sed 's/\ //g')
ZIP=$COM"-"$VER".zip"
if [ -f $ZIP ]; then
  echo "Eliminando" $ZIP"..."
  rm -f $ZIP
fi

echo "Creando" $ZIP"..."
zip -r $ZIP $COM

exit 0

