#!/bin/bash

echo "exporting.."
cd ..
d=$(php artisan export:users)
if [[ $? -eq 0 ]];then
   echo "Data stored in storage/app/users.xlsx"
fi;
cd scripts
