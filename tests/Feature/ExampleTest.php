<?php

namespace Tests\Feature;

use App\Mail\WelcomeEmailMarkdown;
use Event;
use Illuminate\Auth\Events\Registered;
use Mail;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     *
     */
    public function testRegisterUserSendWelcomeEmail()
    {
        Mail::fake();
        $user = new \App\User();
        $user->name = 'Panqueque Gato';
        $user->email = 'panqueque@gmail.com';
        event(new Registered($user));
        Mail::assertSent(WelcomeEmailMarkdown::class,function($mail) use ($user)  {
            return $mail->user->name ===  $user->name && $mail->user->email ===  $user->email;
        });
    }

    /**
     *
     */
    public function testRegisterUserSendWelcomeEmail2()
    {
        Event::fake();
        $this->get('/registerUser');
        Event::assertDispatched(Registered::class,function($event)  {
            return $event->user->name === 'Panqueque Gato';
        });
    }

//    public function testRegisterUserSendWelcomeEmail()
//    {
//        Event::fake();
//
//       $this->visit('/register')
//           ->type('Panqueque','name')
//           ->type('panqueque@gmail.com','email')
//           ->type('123456','password')
//           ->type('123456','password_confirmation')
//           ->press('Register')
//           ->seePageIs('/home')
//           ->seeInDatabase('users',
//               [
//                   'email' => 'panqueque@gmail.com',
//                   'name' => 'Panqueque'
//               ]);
//
//       $user = '';
//
//       Event::assertDispatched(Registered::class, function($event) use ($user) {
//           return $event->user === $user;
//       });
//    }
}
