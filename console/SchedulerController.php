<?php

namespace spk\scheduler\console;

use spk\scheduler\models\TaskRunner;
use yii\console\Controller;

class SchedulerController extends Controller {

	/**
	 * Execute all tasks considering cron time
	 */
	public function actionRun() {
		$runner = new TaskRunner();
		$res = $runner->RunAllTasks();
		switch ($res) {
			case true:
				echo "Success\n";
				break;
			case 0:
				echo "0 tasks are executed\n";
				break;
			default:
				echo "Error. Details:\n" . $runner->output;
				break;
		}
	}

}
