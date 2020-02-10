# Poultry

Sample application created with use of Lumen framwork. It is supposed to showcase possibility of automating horizontal scaling using AWS services. CloudFormation configuration is available in `/infrastructure` directory.

More details available in the following [article](https://medium.com/@j.kapuscik2/autoscale-your-website-in-5-minutes-or-less-3c47f6483b72).

## Deploymant 

In order to deploy application to AWS you can use manage.sh script with approperaite paramaters:

| Parameter | Type | Description |
| :--- | :--- | :--- |
| `Command` | `string` | **Required**. Name of a command - create, update, delete, help |
| `StackName` | `string` | **Required**. Name CF stack |
| `KeyName` | `string` | **Required**. Name of ec2 ssh access key |
| `DatabaseName` | `string` | Name of RDS database. Default: "PoultryDB" |
| `DatabaseUsername` | `string` | Name of RDS database admin user. Default: "admin" |
| `DatabaseUserPassword` | `string` | Name CF stack. Default: "admin123456" |
| `BucketName` | `string` | Name of S3 bucket. **Warning**. Name needs to be unique in whole AWS. Default "eggs-eggs-1234" |

Parameters have to provided in proper order:

```
sh manage.sh create STACK_NAME KEY_NAME DB_NAME DB_USER DB_USER_PASSWORD BUCKET_NAME
```

## Setup

Database migration:
`php artisan migrate`

Database seeding:
`php artisan db:seed`

![Screenshot](screenshot.png?raw=true "Screenshot")
