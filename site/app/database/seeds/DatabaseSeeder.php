<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Issue;
use App\User;
use App\Trail;

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Model::unguard();

		// $this->call('IssueTableSeeder');

		DB::table('issue')->delete();
		DB::table('users')->delete();
		DB::table('trail')->truncate();

		// Issues
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
			'description' => 'i saw a tree down',
			'phone' => '515-225-0001',
			'type' => 'trail issue',
			'location' => 'my campground'
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
			
		// Trails
		Trail::create([
			"name" => "Single Track Mountain Bike",
			"type" => "biking",
			"condition" => "open",
			"difficulty" => "green",
			"length" => "16"
		]);

		Trail::create([
			"name" => "Equestrian",
			"type" => "horse",
			"condition" => "open",
			"difficulty" => "green",
			"length" => "6"
		]);

		Trail::create([
			"name" => "Double Track Multi-Use",
			"type" => "multi",
			"condition" => "open",
			"difficulty" => "green",
			"length" => "12"
		]);

		Trail::create([
			"name" => "Town Loop Crushed Aggregate",
			"type" => "multi",
			"condition" => "open",
			"difficulty" => "green",
			"length" => "10"
		]);
			
		// Users
		
		User::create([
			'name' => 'Jane Doe',
			'email' => 'foo@bar.com',
			'password' => Hash::make('password')
		]);
	}

}
