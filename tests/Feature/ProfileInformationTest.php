<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Http\Livewire\UpdateProfileInformationForm;
use Livewire\Livewire;
use Tests\TestCase;

class ProfileInformationTest extends TestCase
{
    use RefreshDatabase;

    public function test_current_profile_information_is_available()
    {
        $this->actingAs($user = User::factory()->create());

        $component = Livewire::test(UpdateProfileInformationForm::class);

        $this->assertEquals($user->name,            $component->state['name']);
        $this->assertEquals($user->email,           $component->state['email']);
        $this->assertEquals($user->genero,          $component->state['genero']);
        $this->assertEquals($user->fechaNacimiento, $component->state['fechaNacimiento']);

    }

    public function test_profile_information_can_be_updated()
    {
        $this->actingAs($user = User::factory()->create());

        Livewire::test(UpdateProfileInformationForm::class)
                ->set('state', ['name'            => 'Test Name',
                                'email'           => 'test@example.com',
                                'genero'          => 'Otro',
                                'fechaNacimiento' => '2003/12/13'],)

                ->call('updateProfileInformation');

        $this->assertEquals('Test Name',        $user->fresh()->name);
        $this->assertEquals('test@example.com', $user->fresh()->email);
        $this->assertEquals('Otro',             $user->fresh()->genero);
        $this->assertEquals('2003/12/13',       $user->fresh()->fechaNacimiento);
        
    }
}
