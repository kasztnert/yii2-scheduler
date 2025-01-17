# Yii2-scheduler
Cron task scheduler module for yii2. Features:

* Task management (creation, modification, deletion);
* Manually launch tasks or run tasks on a cron schedule;
* Tracking the results of tasks;
* Ajax user interface.

Module is based on egorspk/yii2-scheduler but it contains adaptation to Bootstrap 4, Kartik-V icons, and Yii framework 2.0.14. In the original
Ajax requests did not work with the advanced template, because URLs were incorrect.
## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).
Either run:

```
composer require kasztnert/yii2-scheduler
```

or add
```
"kasztnert/yii2-scheduler": "^1.0"
```
to the require section of your `composer.json` file.

Subsequently, run
```
yii migrate/up --migrationPath=@vendor/kasztnert/yii2-scheduler/migrations
```
in order to create the required tables in your database.

## Usage
1. Add this to your web and console configuration modules array:
```
'modules' => [
  'scheduler' => [
      'class' => 'spk\scheduler\Module'
    ],
   ...
],
```
2. Next, add this line to your crontab file:
```
*/5 * * * * cd /project_path/; /php_path/php yii scheduler/run
```
Where:
 * /project_path/ - path to your yii2 project (for example, /var/www/yii/);
 * /php_path/ php - path to php (for example, /usr/bin/php).
 
Please note that if you add a scheduled task on the GUI, the schedule resolution should correspond to the cron job, so if the 
cron job is configured as */5 * * * *, then you can schedule tasks for minutes that are dividable by 5, otherwise they will
not be executed.

### Settings (web config)
* defaultFolder - path to the folder, where the methods of classes that can be used as a task (default value: 
@app/models);
* folderDepth - depth of class methods search by defaultFolder path (defaut value: 0).

Configuration example:
```
'modules' => [
  'scheduler' => [
      'class' => 'spk\scheduler\Module',
      'defaultFolder' => __DIR__ . '/../models/scheduler',
      'folderDepth' => 0
    ],  
   ...
],
```

## Tasks (methods)
The method must return a value of type bool. True - the task succeeded.

All calls *echo* statement will be written in the log of the task.

## User interface
The user interface is divided into 3 tabs:

* Task list;

![Task list](https://bytebucket.org/egorspk/yii2-scheduler/raw/49c076bf79ff8aa281cc8cad5ec2224cbb3fe5bc/img/task_list.png)

* Add/Edit task;

![Add/Edit task](https://bytebucket.org/egorspk/yii2-scheduler/raw/49c076bf79ff8aa281cc8cad5ec2224cbb3fe5bc/img/add-edit_task.png)

* Task execution log.

![Logs](https://bytebucket.org/egorspk/yii2-scheduler/raw/49c076bf79ff8aa281cc8cad5ec2224cbb3fe5bc/img/logs.png)

## Note

* *img* folder is needed only for README.md;

* file *scheduler.mwb* - database project for the MySQL Workbench program.

## License
MIT