<?php

namespace Hawkiq\AdmLTE\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallCommand extends Command
{
    protected $signature = 'admlte:install {--only=}';
    protected $description = 'Install AdmLTE assets, lang, and configurations';

    public function handle()
    {
        $option = $this->option('only');

        if ($option === 'views') {
            $this->publishViews();
        } elseif ($option === 'auth_views') {
            $this->publishAuthViews();
        } else {
            $this->installAll();
        }
    }

    /**
     * Publish all views.
     */
    protected function publishViews()
    {
        $this->info('Publishing AdmLTE views...');
        $this->call('vendor:publish', [
            '--tag' => 'admlte-views',
            '--force' => true,
        ]);
        $this->info('AdmLTE views published successfully.');
    }

    /**
     * Publish and replace only auth views.
     */
    protected function publishAuthViews()
    {
        $this->info('Publishing AdmLTE auth views...');

        // Define paths
        $authViewsSource = __DIR__ . '/../resources/views/auth';
        $authViewsDestination = resource_path('views/auth');

        // Check if the source directory exists
        if (!File::isDirectory($authViewsSource)) {
            $this->error('AdmLTE auth views not found in the package.');
            return;
        }

        // Delete existing auth views
        if (File::isDirectory($authViewsDestination)) {
            File::deleteDirectory($authViewsDestination);
        }

        // Copy new auth views
        File::copyDirectory($authViewsSource, $authViewsDestination);
        $this->info('AdmLTE auth views published and replaced successfully.');
    }

    /**
     * Install all assets, views, and configurations.
     */
    protected function installAll()
    {
        $this->info('Installing AdmLTE assets...');

        $this->info('Publishing AdmLTE configurations...');
        $this->call('vendor:publish', [
            '--tag' => 'admlte-config',
            '--force' => true,
        ]);

        $this->info('Publishing AdmLTE language files...');
        $this->call('vendor:publish', [
            '--tag' => 'admlte-lang',
            '--force' => true,
        ]);

        $this->info('Publishing AdmLTE assets...');
        $this->call('vendor:publish', [
            '--tag' => 'admlte-assets',
            '--force' => true,
        ]);

        // Paths
        $adminLteSource = base_path('vendor/almasaeed2010/adminlte/dist');
        $bootstrapSource = base_path('vendor/twbs/bootstrap/dist');
        $jquerySource = base_path('vendor/components/jquery');
        $fontawesomeSource = base_path('vendor/components/font-awesome');
        $publicPath = public_path('vendor');

        // Copy AdminLTE assets
        if (File::isDirectory($adminLteSource)) {
            File::copyDirectory($adminLteSource, $publicPath . '/adminlte');
            $this->info('AdminLTE assets copied to public/vendor/adminlte');
        } else {
            $this->error('AdminLTE source assets not found. Did you install the dependencies?');
        }

        // Copy Bootstrap assets
        if (File::isDirectory($bootstrapSource)) {
            File::copyDirectory($bootstrapSource, $publicPath . '/bootstrap');
            $this->info('Bootstrap assets copied to public/vendor/bootstrap');
        } else {
            $this->error('Bootstrap source assets not found. Did you run npm install?');
        }

        // Copy jQuery assets
        if (File::isDirectory($jquerySource)) {
            File::copyDirectory($jquerySource, $publicPath . '/jquery');
            $this->info('jQuery assets copied to public/vendor/jquery');
        } else {
            $this->error('jQuery source assets not found. Did you run npm install?');
        }

        // Copy FontAwesome assets
        if (File::isDirectory($fontawesomeSource)) {
            File::copyDirectory($fontawesomeSource, $publicPath . '/font-awesome');
            $this->info('FontAwesome assets copied to public/vendor/font-awesome');
        } else {
            $this->error('FontAwesome source assets not found. Did you run npm install?');
        }

        $this->info('AdmLTE installation completed.');
    }
}
