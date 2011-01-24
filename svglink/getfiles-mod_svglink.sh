#!/bin/bash

MOD="mod_svglink"


[ -d $MOD ] || exit 1

cd $MOD

for i in $(find ./ -type f | grep -ve "\.xml$" | sed 's/^\.\///g')
do
  if [ $i == "mod_svglink.php" ]; then
    echo "    <filename module=\"mod_svglink\">"$i"</filename>"
  else
    echo "    <filename>"$i"</filename>"
  fi
done

cd ..

exit 0

