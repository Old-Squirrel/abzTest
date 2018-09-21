<?php
use Faker\Generator as Faker;

$autoIncrement = autoIncrement();

$factory -> defineAs(App\Employee::class, 'employee',  function (Faker $faker) use ($autoIncrement){
    $faker = \Faker\Factory::create('ru_RU');
    $autoIncrement->next();
    return [
        'name' => $faker -> lastName($gender = 'male'). ' '.
                  $faker -> firstName($gender = 'male'). ' '.
                  $faker -> firstName($gender = 'male').'ович',
        'post' => $faker -> randomElement($array = array(
            'инженер', 'учитель', 'продавец',
            'программист ', 'машинист', 'шахтер',
            'хирург', 'дизайнер', 'футболист'
        )),
        'date_of_employment' => $faker -> date($format = 'Y-m-d', $max= 'now'),
                      'wage' => $faker -> numberBetween( $min = 1000, $max = 4000),
                  'chief_id' => $autoIncrement -> current()
    ];
} );
function autoIncrement()
{
    for ($i = -1; $i < 50000; $i++) {
        if($i%5 == 0){
            yield 0;
        }
       else{
           yield $i;
       }
    }
}