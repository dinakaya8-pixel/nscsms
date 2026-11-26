<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Accreditation;
use App\Models\NewsItem;
use App\Models\Program;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminTestControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_dashboard_renders_existing_programs_and_news(): void
    {
        Program::create([
            'code' => 'BSIT',
            'title' => 'Information Technology',
            'description' => 'Technology program',
            'image_path' => 'images/program-bsit.jpg',
        ]);

        NewsItem::create([
            'title' => 'Campus Update',
            'excerpt' => 'An update for students.',
            'category' => 'Announcement',
            'image_path' => 'images/news-featured.jpg',
            'is_featured' => true,
            'published_date' => '2026-11-18',
        ]);

        $this->get(route('admin.test'))
            ->assertOk()
            ->assertSee('Information Technology')
            ->assertSee('Campus Update');
    }

    public function test_admin_dashboard_renders_board_member_form_with_alpine_and_store_action(): void
    {
        $this->get(route('admin.test'))
            ->assertOk()
            ->assertSee('<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>', false)
            ->assertSee('action="'.route('board-members.store').'"', false);
    }

    public function test_admin_dashboard_renders_accreditations_for_management(): void
    {
        Accreditation::create([
            'badge_number' => '01',
            'title' => 'Quality Assurance',
            'description' => 'Institutional accreditation details.',
            'theme' => 'forest',
            'icon' => 'award',
            'sort_order' => 1,
        ]);

        $this->get(route('admin.test'))
            ->assertOk()
            ->assertSee('Quality Assurance')
            ->assertSee('action="'.route('accreditations.store').'"', false);
    }

    public function test_valid_program_submission_creates_record_and_stores_image(): void
    {
        Storage::fake('public');

        $response = $this->post(route('admin.programs.store'), [
            'code' => 'BSCS',
            'title' => 'Computer Science',
            'description' => 'Computer science program',
            'image' => UploadedFile::fake()->create('program.jpg', 10, 'image/jpeg'),
        ]);

        $response->assertRedirect()
            ->assertSessionHas('success', 'Program added!');

        $program = Program::query()->sole();

        $this->assertSame('BSCS', $program->code);
        $this->assertStringStartsWith('storage/programs/', $program->image_path);
        Storage::disk('public')->assertExists(substr($program->image_path, strlen('storage/')));
    }

    public function test_valid_news_submission_creates_item_and_replaces_featured_item(): void
    {
        Storage::fake('public');

        $previousFeaturedNews = NewsItem::create([
            'title' => 'Previous Feature',
            'excerpt' => 'Previous excerpt',
            'category' => 'News',
            'image_path' => 'images/previous.jpg',
            'is_featured' => true,
            'published_date' => '2026-11-17',
        ]);

        $response = $this->post(route('admin.news.store'), [
            'title' => 'New Feature',
            'excerpt' => 'New excerpt',
            'category' => 'Announcement',
            'published_date' => '2026-11-18',
            'image' => UploadedFile::fake()->create('news.jpg', 10, 'image/jpeg'),
            'is_featured' => '1',
        ]);

        $response->assertRedirect()
            ->assertSessionHas('success', 'News item published!');

        $this->assertDatabaseHas('news_items', [
            'title' => 'New Feature',
            'is_featured' => true,
        ]);
        $this->assertDatabaseHas('news_items', [
            'id' => $previousFeaturedNews->id,
            'is_featured' => false,
        ]);

        $newsItem = NewsItem::query()->where('title', 'New Feature')->sole();
        $this->assertStringStartsWith('storage/news/', $newsItem->image_path);
        Storage::disk('public')->assertExists(substr($newsItem->image_path, strlen('storage/')));
    }

    public function test_program_can_be_deleted_with_its_uploaded_image(): void
    {
        Storage::fake('public');
        Storage::disk('public')->put('programs/program.jpg', 'image');

        $program = Program::create([
            'code' => 'BSIT',
            'title' => 'Information Technology',
            'description' => 'Technology program',
            'image_path' => 'storage/programs/program.jpg',
        ]);

        $response = $this->delete(route('admin.programs.destroy', $program));

        $response->assertRedirect()
            ->assertSessionHas('success', 'Program deleted!');
        $this->assertDatabaseMissing('programs', ['id' => $program->id]);
        Storage::disk('public')->assertMissing('programs/program.jpg');
    }

    public function test_news_item_can_be_deleted_with_its_uploaded_image(): void
    {
        Storage::fake('public');
        Storage::disk('public')->put('news/news.jpg', 'image');

        $newsItem = NewsItem::create([
            'title' => 'Campus Update',
            'excerpt' => 'An update for students.',
            'category' => 'Announcement',
            'image_path' => 'storage/news/news.jpg',
            'is_featured' => false,
            'published_date' => '2026-11-18',
        ]);

        $response = $this->delete(route('admin.news.destroy', $newsItem));

        $response->assertRedirect()
            ->assertSessionHas('success', 'News item deleted!');
        $this->assertDatabaseMissing('news_items', ['id' => $newsItem->id]);
        Storage::disk('public')->assertMissing('news/news.jpg');
    }
}
