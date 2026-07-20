<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ConvertImagesToWebp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:convert-webp 
                            {path? : The directory path containing images (relative to base path, default: ../assets/images)} 
                            {--delete : Delete original image files after successful conversion}
                            {--skip-code : Skip updating the Blade and config files}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convert all JPG/PNG images to WebP and update Blade/Config references.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // By default we check one level up from core for 'assets/images'
        $inputPath = $this->argument('path') ?? '../assets/images';
        $directory = base_path($inputPath);

        if (!File::exists($directory)) {
            $this->error("Directory does not exist: {$directory}");
            return 1;
        }

        $this->info("Scanning directory: {$directory} for images...");

        $files = File::allFiles($directory);
        $imagesToConvert = [];

        foreach ($files as $file) {
            $extension = strtolower($file->getExtension());
            if (in_array($extension, ['jpg', 'jpeg', 'png'])) {
                $imagesToConvert[] = $file;
            }
        }

        if (empty($imagesToConvert)) {
            $this->info("No JPG or PNG images found in {$directory}.");
        } else {
            $this->info("Found " . count($imagesToConvert) . " images to convert.");

            $bar = $this->output->createProgressBar(count($imagesToConvert));
            $bar->start();

            $convertedFilesCount = 0;

            foreach ($imagesToConvert as $file) {
                $oldPath = $file->getRealPath();
                $directoryName = dirname($oldPath);
                $filenameWithoutExt = pathinfo($oldPath, PATHINFO_FILENAME);
                $newPath = $directoryName . DIRECTORY_SEPARATOR . $filenameWithoutExt . '.webp';

                try {
                    // Encode image to WebP with 80% quality
                    Image::make($oldPath)->encode('webp', 80)->save($newPath);
                    
                    if ($this->option('delete')) {
                        File::delete($oldPath);
                    }
                    
                    $convertedFilesCount++;
                } catch (\Exception $e) {
                    $this->error("\nFailed to convert: {$oldPath}. Error: " . $e->getMessage());
                }

                $bar->advance();
            }

            $bar->finish();
            $this->info("\nSuccessfully converted {$convertedFilesCount} images to WebP.");
        }

        if (!$this->option('skip-code')) {
            $this->updateCodeReferences();
        }

        return 0;
    }

    protected function updateCodeReferences()
    {
        $this->info("\nScanning and updating Blade templates and SEO configuration...");

        $directoriesToScan = [
            resource_path('views'),
            config_path('seo.php'),
        ];

        $filesToUpdate = [];

        foreach ($directoriesToScan as $dirOrFile) {
            if (File::exists($dirOrFile)) {
                if (File::isFile($dirOrFile)) {
                    $filesToUpdate[] = new \SplFileInfo($dirOrFile);
                } elseif (File::isDirectory($dirOrFile)) {
                    $filesToUpdate = array_merge($filesToUpdate, File::allFiles($dirOrFile));
                }
            }
        }

        $updatedFilesCount = 0;

        foreach ($filesToUpdate as $file) {
            if ($file->getExtension() !== 'php') {
                continue;
            }

            $content = File::get($file->getRealPath());
            $originalContent = $content;

            // Safely replace .png, .jpg, .jpeg extensions with .webp globally in view and config files
            $content = preg_replace('/(\.png|\.jpg|\.jpeg)/i', '.webp', $content);

            if ($content !== $originalContent) {
                File::put($file->getRealPath(), $content);
                $updatedFilesCount++;
            }
        }

        $this->info("Updated {$updatedFilesCount} files to use .webp extensions.");
    }
}
