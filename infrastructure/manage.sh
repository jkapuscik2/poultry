#!/bin/bash

if [ "$1" != "create" ] && [ "$1" != "update" ] && [ "$1" != "delete" ]
then
    echo "First parameter must be 'crate', 'update' or 'delete'. $1 given"
    exit 1
fi

if [ -z "$2" ]
then
    echo "Stack name must be provided as second argument"
    exit 1
fi

if [  "$1" == "delete" ]
then
    echo "Deleting stack: $2"
    aws cloudformation delete-stack --stack-name "$2"
    exit 0
fi


if [ -z "$2" ]
then
    echo "KeyName must be provided as third argument"
    exit 1
fi


if [  "$1" == "create" ]
then
    echo "Creating stack: $2"
    aws cloudformation create-stack --stack-name "$2" --template-body file://base.yml --capabilities CAPABILITY_IAM --parameters ParameterKey=KeyName,ParameterValue="$3"
fi

if [  "$1" == "update" ]
then
    echo "Updating stack: $2"
    aws cloudformation update-stack --stack-name "$2" --template-body file://base.yml --capabilities CAPABILITY_IAM --parameters ParameterKey=KeyName,ParameterValue="$3"
fi

