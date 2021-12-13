<?php

namespace PatrickRiemer\PasswordReset\Console;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class UserSetPassword extends Command
{
    protected $signature = 'user:setPassword';

    protected $description = 'Reset the password of a user';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $email = $this->ask('What is the email address of the user?');
        $password = $this->ask('What is the new password?');

        $user = User::where('email', $email)->first();

        if (! $user) {
            $this->warn('User not found');
        } else {
            $user->password = Hash::make($password);
            $user->save();

            $this->info('Password updated!');
        }
    }
}
