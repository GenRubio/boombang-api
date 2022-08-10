<?php

use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Staudenmeir\LaravelMergedRelations\Facades\Schema;

class CreateFriendsView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::createMergeView(
            'friends_view',
            [(new User())->acceptedFriendsTo(), (new User())->acceptedFriendsFrom()]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friends_view');
    }
}
