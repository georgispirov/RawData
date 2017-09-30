<?php

spl_autoload_register(function($class) {
    $path = dirname(dirname(__DIR__)) . '/test/RawData' . DIRECTORY_SEPARATOR . $class . '.php';
    require $path;
});

class Car
{
    /* @var $model string */
    public $model;

    /* @var $engine Engine */
    public $engine;

    /* @var $cargo Cargo */
    public $cargo;

    /* @var $tires [] */
    public $tires;

    /**
     * Car constructor.
     * @param string $model
     * @param Engine $engine
     * @param Cargo $cargo
     * @param array $tires
     */
    public function __construct(string $model, Engine $engine, Cargo $cargo, array $tires)
    {
        $this->model  = $model;
        $this->engine = $engine;
        $this->cargo  = $cargo;
        $this->tires  = $tires;
    }
}

$inputArray = [];
$rows = intval(fgets(STDIN));
for ($i = 1; $i <= $rows; $i++) {
    $input = trim(fgets(STDIN));
    $inputArray [] = explode(' ', $input);
}
$whatdoto = trim(fgets(STDIN));

$inputArray = array_map(function ($var) {
    return [
        'model'         => (string)$var[0],
        'engine' =>
        [
            'engineSpeed'   => (int)$var[1],
            'enginePower'   => (int)$var[2],
        ],
        'cargo' =>
        [
            'cargoWeight'   => (int)$var[3],
            'cargoType'     => (string)$var[4],
        ],
        'tire1' =>
        [
            'tire1pressure' => (double)$var[5],
            'tire1age'      => (int)$var[6],
        ],
        'tire2' =>
        [
            'tire2pressure' => (double)$var[7],
            'tire2age'      => (int)$var[8],
        ],
        'tire3' =>
        [
            'tire3pressure' => (double)$var[7],
            'tire3age'      => (int)$var[8],
        ],
        'tire4' =>
        [
            'tire4pressure' => (double)$var[7],
            'tire4age'      => (int)$var[8],
        ]
    ];
}, $inputArray);

$objects = [];

foreach ($inputArray as $item) {
    $engine  = new Engine($item['engine']['engineSpeed'], $item['engine']['enginePower']);
    $cargo   = new Cargo($item['cargo']['cargoWeight'], $item['cargo']['cargoType']);
    $tireArray =
    [
          new Tire($item['tire1']['tire1pressure'], $item['tire1']['tire1age']),
          new Tire($item['tire2']['tire2pressure'], $item['tire2']['tire2age']),
          new Tire($item['tire3']['tire3pressure'], $item['tire3']['tire3age']),
          new Tire($item['tire4']['tire4pressure'], $item['tire4']['tire4age'])
    ];
    $objects [] = new Car($item['model'], $engine, $cargo, $tireArray);
}

$result = [];

if($whatdoto == 'flamable') {
    foreach ($objects as $key => $value) {
        if($value->cargo->type == 'flamable' && $value->engine->power > 250) {
            echo $value->model . PHP_EOL;
        }
    }
}

if($whatdoto == 'fragile') {
    foreach ($objects as $key => $value) {
        if($value->cargo->type == 'fragile' && current($value->tires)->pressure < 1) {
            echo $value->model . PHP_EOL;
        }
    }
}