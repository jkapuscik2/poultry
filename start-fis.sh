#!/bin/bash

if [ -z "$1" ]
then
    echo "Please provide an id of a FIS experiment template"
    exit 1
fi

aws fis start-experiment --experiment-template-id $1

watch -d -n 3 -t aws ec2 describe-instances --filters "Name=tag:app,Values=poultry" "Name=instance-state-name,Values=running" --query 'Reservations[*].Instances[*].InstanceId'
