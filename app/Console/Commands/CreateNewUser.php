<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateNewUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:createuser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a new user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $user = new User;

        $this->comment('Please input the new user\'s information');

        $user->email = $this->ask('Email Address');
        $user->name = $this->ask('Name');
        $user->company = $this->ask('Company');
        $password = str_random(12);
        $user->password = Hash::make($password);

        $user->save();

        $this->comment('New user created');
        $this->line('');

        $this->info('Username: ' . $user->email);
        $this->info('Password: ' . $password);
        $this->line('------------------');

        if ($this->confirm('Do you want to add another user?')) {
            $this->handle();
        }

    }
}
