#!/bin/bash

if [ "$1" != "create" ] && [ "$1" != "update" ] && [ "$1" != "delete" ] && [ "$1" != "help" ]
then
    echo "First parameter must be 'create', 'update', 'delete' or 'help'. $1 given"
    exit 1
fi

if [  "$1" == "help" ]
then
    echo "Avalibale commands: crete, update, delete, help"
    echo "Command params:"
    echo "1.  Command - name of command | Required"
    echo "2.  StackName - name CF stack | Required"
    echo "3.  KeyName - name of e2c ssh access key | Required"
    echo "4.  DatabaseName - name of RDS database"
    echo "5.  DatabaseUsername - name of RDS database admin user"
    echo "6.  DatabaseUserPassword - name of RDS database admin user password"
    echo "7.  BucketName - name of S3 bucket"
    exit 0
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


if [ -z "$3" ]
then
    echo "KeyName must be provided as third argument"
    exit 1
fi

DatabaseName=$4
DefaultDatabaseName="PoultryDB"
if [ -z "$DatabaseName" ]
then
    DatabaseName=$DefaultDatabaseName
    echo "DatabaseName not provided. Using default '$DefaultDatabaseName'"
fi
DatabaseUsername=$5
DefaultDatabaseUsername="admin"
if [ -z "$DatabaseUsername" ]
then
     DatabaseUsername=$DefaultDatabaseUsername
    echo "DatabaseUsername not provided. Using default '$DefaultDatabaseUsername'"
fi
DatabaseUserPassword=$6
DefaultDatabaseUserPassword="admin123456"
if [ -z "$DatabaseUserPassword" ]
then
     DatabaseUserPassword=$DefaultDatabaseUserPassword
    echo "DatabaseUserPassword not provided. Using default '$DefaultDatabaseUserPassword'"
fi
BucketName=$6
DefaultBucketName="eggs-eggs-1234"
if [ -z "$BucketName" ]
then
     BucketName=$DefaultBucketName
    echo "BucketName not provided. Using default '$DefaultBucketName'"
fi


if [  "$1" == "create" ]
then
    echo "Creating stack: $2"
    aws cloudformation create-stack --stack-name "$2" --template-body file://infrastructure/base.yml --capabilities CAPABILITY_IAM --parameters ParameterKey=KeyName,ParameterValue="$3" ParameterKey=DatabaseName,ParameterValue="$DatabaseName" ParameterKey=DatabaseUsername,ParameterValue="$DatabaseUsername" ParameterKey=DatabaseUserPassword,ParameterValue="$DatabaseUserPassword" ParameterKey=BucketName,ParameterValue="$BucketName"
fi

if [  "$1" == "update" ]
then
    echo "Updating stack: $2"
    aws cloudformation update-stack --stack-name "$2" --template-body file://infrastructure/base.yml --capabilities CAPABILITY_IAM --parameters ParameterKey=KeyName,ParameterValue="$3" ParameterKey=DatabaseName,ParameterValue="$DatabaseName" ParameterKey=DatabaseUsername,ParameterValue="$DatabaseUsername" ParameterKey=DatabaseUserPassword,ParameterValue="$DatabaseUserPassword" ParameterKey=BucketName,ParameterValue="$BucketName"
fi

