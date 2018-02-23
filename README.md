# Perfunctory Robot

A robot will gave you just a perfunctory nod.

This is a `Alexa Skills Kit` example code of PHP  
implementation using [maxbeckers/amazon-alexa-php](https://github.com/maxbeckers/amazon-alexa-php) library.

### Usage

A perfunctory robot will listen what you says but replys perfunctory words.

> Me: Alexa, open perfunctory robot.  
>   
> Echo: Hi, I'm perfunctory robot.  
> I'm will be here and listen what you says.  
> Which topic do to want to say?  
> 
> Me: How old are you?  
> Echo: Hmm.  
> Me: What the fox say?  
> Echo: Ah.  
>   
> ... (and so on)  
>   
> Me: Stop.  
> Echo: Have a great conversation, good bye. 

### Skill Setup

Go to [Alexa developer page](https://developer.amazon.com/) and add a custom skill you want.  
Here is examples.

##### Skill Information

- Skill Type: **Custom Interaction Model**
- Language: **English (U.S.)**
- Name: **Perfunctory Robot**
- Invocation Name: **perfunctory robot**

-

##### Interaction Model (in JSON format):

	
	{
	  "languageModel": {
	    "intents": [
	      {
	        "name": "AMAZON.CancelIntent",
	        "samples": []
	      },
	      {
	        "name": "AMAZON.HelpIntent",
	        "samples": []
	      },
	      {
	        "name": "AMAZON.StopIntent",
	        "samples": []
	      },
	      {
	        "name": "SayHelloIntent",
	        "samples": [
	          "Say hello to {name}",
	          "Hello to {name}"
	        ],
	        "slots": [
	          {
	            "name": "name",
	            "type": "AMAZON.US_FIRST_NAME"
	          }
	        ]
	      }
	    ],
	    "invocationName": "perfunctory robot"
	  }
	}
	
##### Configuration

###### Global Fields

- Endpoint
	- Service Endpoint Type: **HTTPS**
	- HTTPS: \<Type your server endpoint here\>
	- Provide geographical region endpoints? **No**
- Account Linking
	- Do you allow users to create an account or link to an existing account with you? **No**
- Permissions
	- Request users to access resources and capabilities  
	 **Select None**
	 
##### SSL Certificate 

###### Global Fields

- Certificate for DEFAULT Endpoint:
	- My development endpoint has a certificate  
	from a trusted certificate authority

##### Test

- You can test your services here or your Amazon Echo.


### Code setup

This code need PHP and httpd environment.  
SSL certificate is requried.   
(For testing purpose, you can user self-signed certificate)  

I use PHP7 and Apache for the environment.  
Composer is needed.

1. Use composer for update the project.

	```
	$ composer install
	```

2. Edit `Handlers/MyAbstractRequestHandler.php`  
fill-in your Skill-Id

	```
	abstract class MyAbstractRequestHandler extends AbstractRequestHandler
	{
	    public function __construct(ResponseHelper $responseHelper)
	    {
	        $this->supportedApplicationIds = ['my_amazon_skill_id'];
	    }
	}
	```

3. Setup skill info


### What insides the code?

The example implements these required request.

- LaunchRequest

	Sample Utterances: 
	
	> Alexa, ask perfunctory Robot.  
	> Alexa, open perfunctory Robot. 

- IntentRequest

	- SayHelloIntent (Our customized intent)
	
		Sample Utterances: 
	
		> Alexa, ask perfunctory Robot to say hello to Johnny.
	 
	- AMAZON.HelpIntent
	
		Sample Utterances: 
	
		> Help
		
	- AMAZON.CancelIntent
	
		Sample Utterances: 
	
		> Cancel
	
	- AMAZON.StopIntent
	
		Sample Utterances: 
		> Stop

- SessionEndedRequest

	Sample Utterances: 
	> Exit
	
	or long time not response.


There is other default intents need to handle depends on your services.  
But these are basic need.

### License

MIT