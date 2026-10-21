Schema::create('otp_verifications', function (Blueprint $table) {
    $table->id();

    $table->foreignId('user_id')
        ->constrained('users')
        ->cascadeOnDelete();

    $table->string('otp');

    $table->timestamp('expires_at');

    $table->timestamp('verified_at')->nullable();

    $table->timestamps();
});