# Damascus
A simple middlewares implementation in php. Like Damascus Steel, this is about layers

## Installation
```
composer require ww/damascus
```

## Basic Usage

### 1. Create Middlewares
```
class IncFooMiddleware implements Damascus\MiddlewareInterface
{
    public function run(Damascus\DataBucketInterface $dataBucket, MiddlewareStep $next)
    {
        $dataBucket['foo'] += rand(0,12);
        
        if ($dataBucket['foo'] < 10) {
            $next->run($dataBucket);
        }
    }
}

class MailerMiddleware implements Damascus\MiddlewareInterface
{
    private $mailer;
    
    //I'm not coding the constructor of this
    
    public function run(Damascus\DataBucketInterface $dataBucket, MiddlewareStep $next)
    {
        $this->mailer->send($dataBucket['from'], $dataBucket['to'], $dataBucket['subject'], $dataBucket['body']);
    }
}
```

### 2. Push middlewares to a stack
```
$middleware = ;
$stack = (new Damascus\MiddlewareStack())
    ->pushMiddleware(new IncFooMiddleware())
    ->pushMiddleware(new MailerMiddleware());
```

### 3. Start the forgery
```
$dataBucket = new Damascus\DataBucket([
    'from' => 'asdf@gmail.com',
    'to' => 'asdf@gmail.com',
    'subject' => 'threshold 10 not reached',
    'body' => 'threshold 10 not reached',
    'foo' => 0,
]);

$stack->run($dataBucket);
```

## Advanced topics
- Create so many middlewares as you need. You can use DIC to reuse them and to add them dependencies.
- You can use DIC also to reuse a middlewares stack.
- You can create your custom DataBucketInterface as you want with the data you need, and ensure is the right one in your middlewares.

## Future
I would like to create in a near future a Symfony bundle for this, allowing, using DIC tags to automatically generate middleware stacks.