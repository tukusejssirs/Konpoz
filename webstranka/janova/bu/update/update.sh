#!/bin/bash

# list all files on server with their respective sizes
#ssh root@195.140.254.159 /usr/bin/wc -c $(ssh root@195.140.254.159 find /var/www -type f | sed 's/[$]/\\$/g' - | sed 's/[`]/\\$/g' - | sed 's/[\]/\\\\/g' - | sed 's/[!]/\\!/g' - | sed 's/[ ]/\\ /g' -) | sed 's/\/var\/www\///g' - | sed '$d' - | sort -k2 > server

# list all files on local machine with their respective sizes
#/usr/bin/wc -c $(find /root/mega.d/.prgs/konpoz/webstranka/janova -type f | sed 's/[$]/\\$/g' - | sed 's/[`]/\\`/g' - | sed 's/[\]/\\\\/g' - | sed 's/[!]/\\!/g' - | sed 's/[ ]/\\ /g' - | grep -v /root/mega.d/.prgs/konpoz/webstranka/janova/test/) | sed 's/\/root\/mega\.d\/\.prgs\/konpoz\/webstranka\/janova\///g' - | sed '$d' - | sort -k2 > local

# dived files local and server into 4 files (working)
#cat local | awk '{printf $1 "\n"}' > loc_size
#cat local | awk '{printf $2 "\n"}' > loc_name
#cat server | awk '{printf $1 "\n"}' > ser_size
#cat server | awk '{printf $2 "\n"}' > ser_name

# diff
#/bin/diff -y --suppress-common-lines local server > diff  # correct it without -y option

# divide file diff  # all 4 wrong outputs (wrong)
#cat diff | awk '{printf $1 "\n"}' > loc_size  
#cat diff | awk '{printf $2 "\n"}' > loc_name  # with < means file present only on local machine, unless "<.*\n..."
#cat diff | awk '{printf $4 "\n"}' > ser_size  
#cat diff | awk '{printf $5 "\n"}' > ser_name  # with > means file present only on server, unless "...\n>"

# some variables
number_of_lines=`cat -n local | tail -1 | awk '{printf $1}'`  # number of all files in $lpath recursively
lpath="/root/mega.d/.prgs/konpoz/webstranka/janova"  # local path
spath="/var/www"  # server path
skip="195.140.254.159"  # server konpoz ip address; if not run locally as root (the very same user name used on the server), it needs to be modified to `root@195.140.254.159'

# copy file from local machine to server (1) if it does not exist on server; (2) if local file is larger than one on server; (3) if local file modification date is newer than one of server-hosted file
for (( n=60; n<=$number_of_lines; n++ )); do
	rp_file=$(sed -n `echo -n $n`p loc_name)  # relative path + file name
	fname=$(if [[ "`echo $rp_file | grep \/`" == "" ]]; then echo $rp_file; else echo $rp_file | rev | grep -o '^[^/]*' | rev; fi)
	fpath=`echo $rp_file | sed 's/\/'"$fname"'//' -`

	ssh $skip if [[ -a $spath/$path/$fname ]]; then
		if [[ -a $lpath/$path/$fname ]]; then
			continue
		else
			echo "Do you want to copy this file from server to your local computer? (y/n)"
			read()  # not working
			if yYaA
				scp -pr $skip:$spath/$path/$fname $lpath/$path
			elif nN
				continue
			fi
		fi

		lm_date=`ssh $skip stat -c %Y $spath/$path/$fname`
		sm_date=`stat -c %Y $lpath/$path/$fname`

		if [[ "$lm_date" -ge "$sm_date" ]]; then
			scp -pr $lpath/$path/$fname $skip:$spath/$path
		fi

		unset lm_date sm_date
	else
		scp -pr $lpath/$path/$fname $skip:$spath/$path
	fi


	echo $rp_file
	echo $fname
	echo $fpath
	echo $fpath/$fname
	echo $lpath/$fpath/$fname
	echo $spath/$fpath/$fname

	if [[ $lpath/$fpath/$fname -nt $spath/$fpath/$fname ]]; then  ## true if local file has been changed more recently then server file, or if local file exists and server file does not


		scp -pr $lfile $spath/$fpath/
		echo $spath/$fpath/$fname >> copied_files

		sed -n `echo -n $n`p ser_name;  # test: print eache line of a file :)
	elif [[ xxx ]]; then  # if $fname only exists on server, what to do?
		
	fi

	unset rp_file fname fpath
done

# some helpful one-liners ;)
#wc -c ser_name | cut -d' ' -f1  # print size of ser_name file
#sed -n 30{p;q} diff  # output the 30th line of diff file
#diff -ry --suppress-common-lines  ../aaa <(ssh $skip cat /var/www/aaa)  # diff files over ssh

# clean
#echo "Removing unnecessary files ..."
#rm -rf diff ser* loc*

# echo "Done."

#echo "There is a leftover: file called 'copied_files' contains a list of copied files."

exit 0;

# TODO
#
# - if file is present *only* on server - when copy it to local machine and when remove it?
