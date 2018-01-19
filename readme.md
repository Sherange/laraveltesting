# Laravel 5.5 Testing With Example

### PHPUnit Environment
When we are running the tests via phpunit then Laravel will set the environment to test automatically.  It configures the cache and session environment to the array driver. So while testing, no session or cache data is persisted. You can actually see it in below code. Go to phpunit.xml file.

```xml
<php>
     <env name="APP_ENV" value="testing"/>
     <env name="CACHE_DRIVER" value="array"/>
     <env name="SESSION_DRIVER" value="array"/>
     <env name="QUEUE_DRIVER" value="sync"/>
</php>
```

Laravel 5.5 Testing: Creating and Running Tests

>The first step would be to install brand new Laravel 5.5 Project.

# Step 1: Install Laravel 5.5 Testing Project

```
composer create-project laravel/laravel laraveltesting --prefer-dist
```
```
php artisan migrate
```

>Now, for testing, we will create another model and migration file. So type the following command.

```
php artisan make:model Stock -m
```

>It will create stocks table also and we need to define the schema for it.

```
<?php

// create_stocks_table

  /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('price');
            $table->timestamps();
        });
    }
```

```
php artisan migrate
```


# Step 2: Mass assignment exception

In model Stock.php file, add the following property in it.

```
protected $fillable = ['name','price'];
```

# Step 3: Make the test file.

To make a test file, there is an artisan command for it, so type in the terminal,

```
php artisan make:test StockTest
```

>This will create feature test file inside tests  >>  Feature  >>  StockTest file.

>Now, the file will look like this.

```
<?php

// StockTest.php 

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StockTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
}
```

Next step would be to write one simple test in the testExample() function.

```
<?php

// StockTest.php

namespace Tests\Feature;

use Tests\TestCase;
use App\Stock;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StockTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
      $stock = new Stock(['name'=>'Tesla']);
      $this->assertEquals('Tesla', $stock->name);
    }
}
```

Here, I have included our model Stock.php in the StockTest.php file and created an object and try to insert one stock in the array. Remeber by default we are using array drivers. If I have not included the model correctly or I have not added the fillable property in the model then this test will fail otherwise It will pass the test.

# Step 4: Run the test.

Please type the following command to run the test.

```
phpunit
```

>Note: If this will throw an error then please run following command.

```
vendor/bin/phpunit
```

or

```
vendor\bin\phpunit
```
One of this options will definitely run your tests.