jQuery-confirmOn
=================

A jQuery plugin for adding an easy 'are you sure' confirmation pop-up before the handler in .on() is called.

##Changelog
* [v0.1.3](https://github.com/invetek/jquery-confirmon/tree/0.1.3) - The 'No' button is now standard focused, the tab key works as expected and the esc key closes the pop-up
* [v0.1.2](https://github.com/invetek/jquery-confirmon/tree/0.1.2) - ClassPrepend option is now also used for the inner elements of the pop-up
* [v0.1.1](https://github.com/invetek/jquery-confirmon/tree/0.1.1) - Added a handler for answer 'no'
* [v0.1.0](https://github.com/invetek/jquery-confirmon/tree/0.1.0) - Initial release

##What does this plugin?

The confirmOn plugin shows a confirmation box when the provided events are triggered. It works exactly like jQuery's .on() but with a confirmation step between the event and the handler. When the user answers the confirmation dialog, the handler is called with the answer as a parameter, so you can decide what to do next. The user can press the escape key which closes the dialog and doesn't call the yes or no handlers.

![Example of confirmation box](/doc/screenshot_2.png)

##Installing

Grab jquery.confirmon.js from the repository and insert the following line _after_ the jQuery script in your code:
```html
<script src="jquery.confirmon.js"></script>
```

That's all.

Maybe you want to use the stylesheet that creates a screenwide overlay and a centered box. No problem, just
add jquery.confirmon.css to your html.

```html
<link rel="stylesheet" type="text/css" href="jquery.confirmon.css"/>
```

Since there are only a few classes involved you can insert the classes into your existing stylesheet for performance sake.

##Usage

Use .confirmOn() the same way as you use jQuery's .on(). Check http://api.jquery.com/on/ for the documentation.

There are some options that can be set to customize the plugin. Add them as the first argument of .confirmOn().

```javascript
{
  questionText: 'Are you sure?', // The confirmation question
  classPrepend: 'confirmon', // Use another prefix for the classes used by the plugin
  textYes: 'Yes', // Text on the button the user clicks when the handler should be called 
  textNo: 'No' // Text on the button the user clicks when the handler should not be called
}
```

##Example
```javascript
$('#myButton').confirmOn('click', function(e, confirmed){
    if(confirmed) deleteSomethingImportant();
    else {
        //If we need to, we can do some actions here if the user cancelled the confirmation
    }
})
```
When #myButton is clicked, this confirmation box pops up:<br>
![Screenshot of a confirmation box](/doc/screenshot_1.png)


Check out this [live](http://www.invetek.nl/samples/confirmon/index.html) sample (and its [source](sample)).

##Maintainers
People who've contributed:
* [Dag Jomar Mersland | MazeMap](https://github.com/dagjomar)
* [Maxime Thirouin | MoOx] (https://github.com/MoOx)
