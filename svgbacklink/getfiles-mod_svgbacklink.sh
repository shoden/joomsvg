#!/bin/bash

MOD="mod_svgbacklink"


[ -d $MOD ] || exit 1

cd $MOD

for i in $(find ./ -type f | grep -ve "\.xml$" | sed 's/^\.\///g')
do
  if [ $i == "mod_svgbacklink.php" ]; then
    echo "    <filename module=\"mod_svgbacklink\">"$i"</filename>"
  else
    echo "    <filename>"$i"</filename>"
  fi
done

cd ..

exit 0

