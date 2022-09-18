<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;



class CrudTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_list_event_appear_in_home()
    {
        $this->withExceptionHandling();

        $events = Event::factory(2)->create();

        $response = $this->get('/');
        $response->assertStatus(200)
                ->assertViewIs('home');
    }

/*eliminado */

    public function test_event_can_be_deleted()
    {
        $this->withExceptionHandling();

        $event = Event::factory()->create();
        $this->assertCount(1, $event::all());

        $userNoAdmin = User::factory()->create([
            'isAdmin' => false]);
        $this->actingAs($userNoAdmin);
        $response = $this->delete(route('delete', $event->id));
        $this->assertCount(1, Event::all());

        $userAdmin = User::factory()->create([
            'isAdmin' => true]);
        $this->actingAs($userAdmin);
        $response = $this->delete(route('delete', $event->id));

        $this->assertCount(0, Event::all());
    }

    public function test_a_event_can_be_create(){
        $this->withExceptionHandling();
        
        $response = $this->post(route('storeEvent'),[
                'name' => 'name',
                'description' => 'description',
                'image' => 'image',
                'spaces' => 'spaces',
                'location' => 'location',
                'date' => 'date',
                
        ]);
        $this->assertCount(1, Event::all());

    }


    public function test_an_event_can_be_updated() {
        $this->withExceptionHandling();

        $event = Event::factory()->create();
        
        $this->assertCount(1, Event::all());

        $response = $this->patch(route('updateEvent', $event->id), ['name'=> 'New Name']);
        $this->assertEquals('New Name', Event::first()->name);

    }

    public function test_a_event_appear_in_show(){
        $this->withExceptionHandling();
        $event = Event::factory()->create();
        $response = $this->get(route('showEvent', $event->id));
        $response->assertStatus(200)
                    ->assertViewIs('showEvent'); 
        $response->assertSee('show');
    }
        

    public function test_a_user_can_inscribe(){
        $this->withExceptionHandling();
        $event = Event::factory()->create();
        $user = User::factory()->create();
            
        $response = $this->get(route('inscribe', $user->id ,$event->id));
        $this->actingAs($user);
                
        $response->assertSee('');
    }

    public function test_a_user_can_cancelInscription(){
        $this->withExceptionHandling();
        $user = User::factory()->create();
        $event = Event::factory()->create();
        $response = $this->get(route('cancelInscription', $user->id, $event->id));
        $this->actingAs($user);
                    
        $response->assertSee('');

    }
    public function test_a_event_appear_in_eventRegister(){
        $this->withExceptionHandling();
        $event = Event::factory()->create();
        
        $response = $this->get(route('eventRegister', $event->id));
        $response->assertStatus(302);

        $response->assertSee('');   

    }
}