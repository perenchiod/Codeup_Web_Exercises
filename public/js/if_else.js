// ignore these lines for now
// just know that the variable 'color' will end up with a random value from the colors array
var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];
var color = colors[Math.floor(Math.random()*colors.length)];

var favorite = 'blue'; // TODO: change this to your favorite color from the list
var correctColor = "";

// TODO: Create a block of if/else statements to check for every color except indigo and violet.
if (color == "red") {
	console.log("The color was red like a firetruck.");
} else if (color == "orange") {
	console.log("The color was orange like a carrot.");
} else if (color == "yellow") {
	console.log("The color was yellow bright sunflower in the spring.");
} else if (color == "green") {
	console.log("The color was green like a well watered grass in the summer.");
} else if (color == "blue") {
	console.log("The color was blue like the dark deep seas");
} else {
	console.log("The color must be either indigo or violet. I know nothing of these colors!");
}

// TODO: When a color is encountered log a message that tells the color, and an object of that color.
//       Example: Blue is the color of the sky.

// TODO: Have a final else that will catch indigo and violet.
// TODO: In the else, log: I do not know anything by that color.

// TODO: Using the ternary operator, conditionally log a statement that
//       says whether the random color matches your favorite color.

correctColor = (favorite == color) ? "This is my favorie color!" : "This is not my favorite color.";
console.log(correctColor);

