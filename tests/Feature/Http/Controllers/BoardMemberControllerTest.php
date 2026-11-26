<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\BoardMember;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BoardMemberControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_persists_group_label_for_board_member(): void
    {
        $response = $this->from(route('admin.test'))->post(route('board-members.store'), [
            'name' => 'Board Chair',
            'role' => 'Chair',
            'group_label' => 'Board of Trustees',
        ]);

        $response->assertRedirect(route('admin.test'))
            ->assertSessionHas('board_status', 'Board member added successfully.');

        $this->assertDatabaseHas('board_members', [
            'name' => 'Board Chair',
            'group_label' => 'Board of Trustees',
        ]);
    }

    public function test_update_persists_group_label_for_board_member(): void
    {
        $boardMember = BoardMember::create([
            'name' => 'Board Chair',
            'role' => 'Chair',
            'group_label' => 'Old Group',
        ]);

        $response = $this->from(route('admin.test'))->put(route('board-members.update', $boardMember), [
            'name' => 'Board Chair',
            'role' => 'Chair',
            'group_label' => 'Board of Trustees',
        ]);

        $response->assertRedirect(route('admin.test'))
            ->assertSessionHas('board_status', 'Board member updated.');

        $this->assertDatabaseHas('board_members', [
            'id' => $boardMember->id,
            'group_label' => 'Board of Trustees',
        ]);
    }
}
