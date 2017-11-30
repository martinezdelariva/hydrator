[![Build Status](https://travis-ci.org/martinezdelariva/hydrator.svg?branch=master)](https://travis-ci.org/martinezdelariva/hydrator)

# Hydrator

Hydrate and extract functions made simple. Ideally for flat objects or primitive data.

## Installation

Install it using [Composer](https://getcomposer.org/)


    composer require martinezdelariva/hydrator


## Usage

Having the following class:

```php
    class Person
    {
        private $name;
        private $age;
        private $hobbies = [];
        private $student = false;
    
        public function __construct(string $name, int $age, array $hobbies, bool $student)
        {
            $this->name     = $name;
            $this->age      = $age;
            $this->hobbies  = $hobbies;
            $this->student  = $student;
        }
    }
```

Extraction:

```php
    use function Martinezdelariva\Hydrator\extract;

    $person = new Person("John", 29, ["soccer", "reading"], true);
    extract($person);
   
    // array (
    //   'name'    => 'John',
    //   'age'     => 29,
    //   'hobbies' => array (
    //       0 => 'soccer',
    //       1 => 'reading',
    //   ),
    //   'student' => true,
    // )
```


Hydration:

```php
    use function Martinezdelariva\Hydrator\hydrate;
    
    $values = [
        "name"    => "Maria",
        "age"     => 30,
        "hobbies" => ["swimming", "coding"],
    ];
    $person = hydrate(Person::class, $values);

    // object(Person)#48 (4) {
    //   ["name":"Person":private] => string(5) "Maria"
    //   ["age":"Person":private]  => int(30)
    //   ["hobbies":Person":private]=>
    //       array(2) {
    //         [0]=>
    //         string(8) "swimming"
    //         [1]=>
    //         string(6) "coding"
    //       }
    //   ["student":"Person":private] => bool(false)
```
