<?php

namespace Database\Factories;

use App\Models\Joke;
use Illuminate\Database\Eloquent\Factories\Factory;

class JokeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Joke::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
//            کار نکردم درست یاد نگر فتم
//            'title'=>$faker->text(5),
//            'body'=>$faker->paragraph(rand(20,40)),
//            // 'status'=>1,
//            'user_id'=>$faker->int(rand(1,3)),
        ];
    }
}
