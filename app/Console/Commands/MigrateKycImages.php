<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class MigrateKycImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kyc:migrate-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate KYC images from private to public storage';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting KYC image migration...');

        $users = User::whereNotNull('id_image_1')
            ->orWhereNotNull('id_image_2')
            ->get();

        $migrated = 0;
        $errors = 0;

        foreach ($users as $user) {
            $this->info("Processing user: {$user->name} (ID: {$user->id})");

            // Migrate id_image_1
            if ($user->id_image_1) {
                $result = $this->migrateImage($user, 'id_image_1');
                if ($result) {
                    $migrated++;
                } else {
                    $errors++;
                }
            }

            // Migrate id_image_2
            if ($user->id_image_2) {
                $result = $this->migrateImage($user, 'id_image_2');
                if ($result) {
                    $migrated++;
                } else {
                    $errors++;
                }
            }
        }

        $this->info("Migration completed!");
        $this->info("Successfully migrated: {$migrated} images");
        if ($errors > 0) {
            $this->warn("Errors encountered: {$errors} images");
        }
    }

    private function migrateImage(User $user, string $field): bool
    {
        $oldPath = $user->$field;
        
        // Check if the file exists in private storage
        if (!Storage::disk('local')->exists($oldPath)) {
            // Check if it's already in public storage
            if (Storage::disk('public')->exists($oldPath)) {
                $this->line("  - {$field}: Already in public storage");
                return true;
            }
            
            $this->error("  - {$field}: File not found in storage");
            return false;
        }

        try {
            // Read the file from private storage
            $fileContent = Storage::disk('local')->get($oldPath);
            
            // Store in public storage
            $newPath = Storage::disk('public')->put($oldPath, $fileContent);
            
            if ($newPath) {
                // Update the user record
                $user->$field = $newPath;
                $user->save();
                
                // Delete from private storage
                Storage::disk('local')->delete($oldPath);
                
                $this->line("  - {$field}: Successfully migrated");
                return true;
            } else {
                $this->error("  - {$field}: Failed to store in public storage");
                return false;
            }
        } catch (\Exception $e) {
            $this->error("  - {$field}: Error - " . $e->getMessage());
            return false;
        }
    }
} 