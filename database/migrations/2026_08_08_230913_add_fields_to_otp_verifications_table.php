<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('otp_verifications', function (Blueprint $table) {
            if (!Schema::hasColumn('otp_verifications', 'user_id')) {
                $table->foreignId('user_id')
                    ->after('id')
                    ->constrained('users')
                    ->cascadeOnDelete();
            }

            if (!Schema::hasColumn('otp_verifications', 'otp')) {
                $table->string('otp')->after('user_id');
            }

            if (!Schema::hasColumn('otp_verifications', 'expires_at')) {
                $table->timestamp('expires_at')->after('otp');
            }

            if (!Schema::hasColumn('otp_verifications', 'verified_at')) {
                $table->timestamp('verified_at')
                    ->nullable()
                    ->after('expires_at');
            }
        });
    }

    public function down(): void
    {
        Schema::table('otp_verifications', function (Blueprint $table) {
            if (Schema::hasColumn('otp_verifications', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }

            if (Schema::hasColumn('otp_verifications', 'otp')) {
                $table->dropColumn('otp');
            }

            if (Schema::hasColumn('otp_verifications', 'expires_at')) {
                $table->dropColumn('expires_at');
            }

            if (Schema::hasColumn('otp_verifications', 'verified_at')) {
                $table->dropColumn('verified_at');
            }
        });
    }
};