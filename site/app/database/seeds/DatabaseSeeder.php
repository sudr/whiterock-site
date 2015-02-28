<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Issue;

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Model::unguard();

		// $this->call('IssueTableSeeder');

		DB::table('issue')->delete();

			Issue::create([
				'name' => 'John Doe',
				'email' => 'foo@bar.com',
				'status' => 'New',
				'assigned' => new DateTime('06/31/2011'),
				'comment' => 'Random comment',
				'priority' => 'Low',
				'resolved' => new DateTime('06/31/2011'),
				'assigned_to' => 'jflogel'
			]);
			Issue::create([
				'name' => 'Jane Doe',
				'email' => 'foo@bar.com',
				'status' => 'New',
				'assigned' => new DateTime('06/31/2011'),
				'comment' => 'Random comment',
				'priority' => 'Low',
				'assigned_to' => 'bsolo',
				'description' => 'i saw a tree down'
			]);
			Issue::create([
				'name' => 'Jane Doe',
				'email' => 'foo@bar.com',
				'status' => 'In Progress',
				'assigned' => new DateTime('06/31/2011'),
				'comment' => 'Random comment',
				'priority' => 'Low',
				'assigned_to' => 'bsolo'
			]);
	}

}
