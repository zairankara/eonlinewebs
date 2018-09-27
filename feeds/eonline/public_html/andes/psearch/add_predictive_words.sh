#!/bin/sh

DATESINCE=`date +"%Y%m%d" --date '1 day ago'`
#DATESINCE='2013-01-01 00:00:00'
FILENAME='words.txt'
TITLES=`mysql -h preprodabzdb -u eonline_usr --password=30nl1n3 -D eonline_andes --default-character-set=utf8 --skip-column-names -B -s -e "select name from wp_terms where name<>'' AND last_modified >= '$DATESINCE' order by last_modified DESC;"`

echo "$TITLES" | while read -r line
do
        #TIT=`echo $line | awk 'BEGIN { FS="FILENAME:" }{ print $1 }' | awk 'BEGIN {FS=" "} {print}'`
        #tr ' ' '\n' | sed -e 's/[^[:alnum:]]//g' >> $FILENAME
        echo $line | sed -e 's/[^[:alnum:]]/ /g' >> $FILENAME
done

sort $FILENAME | uniq > $FILENAME.mdo

#Elimino las primeras lineas que son basura
#sed -i '1,10d' $FILENAME.mdo 
mv $FILENAME.mdo $FILENAME
