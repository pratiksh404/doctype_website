<?php

namespace doctype_admin\Website\Console;

use Illuminate\Console\Command;

class DoctypeAdminWebsiteInstallerCommand extends Command
{
    protected $signature = "DoctypeAdminWebsite:install {--c|config : Installs only config file} {--f|view : Installs only view files} {--m|migration : Installs only migration files} {--d|dummy : Installs only seed files} {--a|all : Installs all publishable files}";

    protected $description = "This Command installs Doctype Admin Website Package to your Admin Panel";

    public function handle()
    {
        if (!empty($this->options())) {
            if ($this->option('config')) {
                $this->call('vendor:publish', [
                    '--tag' => ['website-config']
                ]);
            }
            if ($this->option('view')) {
                $this->call('vendor:publish', [
                    '--tag' => ['website-views']
                ]);
            }
            if ($this->option('migration')) {
                $this->call('vendor:publish', [
                    '--tag' => ['website-migrations']
                ]);
            }
            if ($this->option('dummy')) {
                $this->call('vendor:publish', [
                    '--tag' => ['website-seeds']
                ]);
            }
            if ($this->option('all')) {
                $this->call('vendor:publish', [
                    '--tag' => ['website-config']
                ]);
                $this->call('vendor:publish', [
                    '--tag' => ['website-views']
                ]);
                $this->call('vendor:publish', [
                    '--tag' => ['website-migrations']
                ]);
                $this->call('vendor:publish', [
                    '--tag' => ['website-seeds']
                ]);
                $this->info("Doctype Admin Website Installed");
            }
        } else {
            $this->error("Please provide option to DoctypeAdminWebsite:install command");
            $this->info("Please see the command structure");
            $this->info("php artisan help DoctypeAdminWebsite:install");
        }
    }
}
