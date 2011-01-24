#!/bin/bash

[ $# -gt 0 ] || exit 1
[ -d $1    ] || exit 1

cd $1

for i in $(find ./ -type f | grep -ve "\.xml$" | sed 's/^\.\///g')
do
  echo "    <filename>"$i"</filename>"
done

cd ..
exit 0

