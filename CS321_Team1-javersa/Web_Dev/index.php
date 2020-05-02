<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Agile Adoption</title>
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <header>
            <h1 class="logo"><a href="/Web_Dev/index.php">Agile Adoption</a></h1>
            <nav">
                <ul class="navList">
                    <li><a href="/Web_Dev/index.php">Home</a></li>
                    <li><a href="/Web_Dev/about.html">About</a></li>
                    <li><a href="/Web_Dev/contact_us.html">Contact Us</a></li>
                    <li><a href="/Web_Dev/wish_list.php">My Wish List</a></li>
                    <li><a href="/Web_Dev/find_pet.html">Find Pet</a></li>                 
                </ul>
            </nav>
        </header>
        <main>

            <h2 class="main-header">Welcome!</h2>


<?php $name = $_POST["name"]; ?>
<?php $gender = $_POST["gender"]; ?>
<?php $dog = $_POST["dog"]; ?>
            <!--start section for pet display-->
            <section>
                <div class="pet-display-header">
                    <h2 class="section__title">Take A Look At Some Of Our Pets!</h2>
                </div>
                 <!--Dogs wrapper-->
                 <section class="pets-wrapper">
                    <h2 class="section__title">Dogs</h2>
					
					<form action="wish_list.php" class="find-wrapper" method="post">
                    <div id="dogs" class="pets">
                        <!--javascript runs here-->
                    </div>
					<br>
					<label>Submit Pets to Wish List: </label>
					<input type="submit" name="submit" value="Submit"><br><br>
					</form>
<script>

//Stores the variables from the find_pet page.
var name = "<?php echo $name;?>";
var gender = "<?php echo $gender;?>";
var breed = "<?php echo $dog;?>";

//Builds off of div
var Dogs = document.getElementById("dogs");

//List of names we have in the database
var names = ["Bella","Charlie","Coco","Daisy","Lola","Molly","Phoebe","Poppy","Rosie","Teddy"];
//List of breeds in the database
var breeds = ["American Pit Bull Terrier","American Staffordshire Terrier","Australian Cattle Dog","Australian Shepherd","Border Collie","Boxer","Dachshund","German Shepherd","Rottweiler","Shih Tzu"];

var count;
if (name.length == 0 || comparisons(name,names) == false){
	if (gender.length == 0){
		if (breed.length == 0 || comparisons(breed,breeds) == false){
			//If name, gender, or breed isn't specified.
			count = 0;
			var i;
			for (i = 0; i < names.length; i++){
				var j;
				for (j = 0; j < breeds.length; j++){
					count = createPet(names[i],"Female",breeds[j],count);
					count = createPet(names[i],"Male",breeds[j],count);
				}
			}
		}
		else {
			//If name and gender isn't specified, but breed is.
			count = 0;
			var i;
			for (i = 0; i < names.length; i++){
				count = createPet(names[i],"Female",breed,count);
				count = createPet(names[i],"Male",breed,count);
			}
		}
	}
	else{
		if (breed.length == 0 || comparisons(breed,breeds) == false){
			//If name isn't specified, gender is specified, and breed isn't.
			count = 0;
			var i;
			for (i = 0; i < names.length; i++){
				var j;
				for (j = 0; j < breeds.length; j++){
					count = createPet(names[i],gender,breeds[j],count);
				}
			}
		}
		else {
			//If name isn't specified, but gender and breed is.
			count = 0;
			var i;
			for (i = 0; i < names.length; i++){
				count = createPet(names[i],gender,breed,count);
			}
		}
	}
}
else{
	if (gender.length == 0){
		if (breed.length == 0 || comparisons(breed,breeds) == false){
			//If name is specified, but gender and breed isn't.
			count = 0;
			var j;
			for (j = 0; j < breeds.length; j++){
				count = createPet(name,"Female",breeds[j]);
				count = createPet(name,"Male",breeds[j]);
			}
		}
		else {
			//If name is specified, and gender isn't, but breed is.
			count = createPet(name,"Female",breed,0);
			count = createPet(name,"Male",breed,1);
		}
	}
	else{
		if (breed.length == 0 || comparisons(breed,breeds) == false){
			//If name and gender is specified, but breed isn't.
			count = 0;
			var j;
			for (j = 0; j < breeds.length; j++){
				count = createPet(name,gender,breeds[j],count);
			}
		}
		else {
			//If name, gender, and breed is specified.
			count = createPet(name,gender,breed,0);
		}
	}
}
//Counts the number of pets for the wish_list.
var c = document.createElement('INPUT');
c.setAttribute("type","hidden");
c.setAttribute("name","count");
c.setAttribute("value",count);
Dogs.appendChild(c);

function createPet(name,gender,breed,count){
	var img = "../Web_Dev/pet_images/" + name + "/" + gender + "/" + breed + "/" + name + ".jpg\n";
	if (doesFileExist(img) == true){
		var d = Dogs.appendChild(createNewPetElement(name));
		d.appendChild(createPetTitle(name));
		d.appendChild(createPetImage(img));
		d.appendChild(createPetInformation(gender,breed));
		d.appendChild(createPetButtons(name,gender,breed,count));
		count = count + 1;
	}
	return count;
}
function createNewPetElement(name){
	var name = document.createElement('div');
	name.classList.add('pet');
	return name;
}
function createPetTitle(name){
	let pet__title = document.createElement('h2');
	pet__title.textContent = name;
	pet__title.classList.add('pet__title');
	return pet__title;
}
function createPetImage(img){
	let pet__img = document.createElement('img');
	pet__img.setAttribute("src",img);
	pet__img.setAttribute("width","100%");
	pet__img.setAttribute("height","100%");
	pet__img.setAttribute("alt", "Pet picture");
	return pet__img;
}
function createPetInformation(gender,breed){
	var pet__information_div = document.createElement('div');
	pet__information_div.classList.add('pet__information');
	let pet__gender = document.createElement('p');
	pet__gender.textContent = gender;
	pet__information_div.appendChild(pet__gender);
	let pet__breed = document.createElement('p');
	pet__breed.textContent = breed;
	pet__information_div.appendChild(pet__breed);
	return pet__information_div;
}
function createPetButtons(name,gender,breed,count){
	let button_div = document.createElement('div');
	let button_wishList = document.createElement('a');
	let button_viewProfile = document.createElement('a');
	let input = document.createElement("INPUT");
	
	button_div.classList.add('btn__wrapper');
	
	button_wishList.classList.add('btn');
	button_wishList.classList.add('btn-color');
	button_wishList.textContent = 'Add to Wish List';
	
	button_viewProfile.classList.add('btn');
	button_viewProfile.classList.add('btn-color');
	button_viewProfile.textContent = "View Pet Profile";
	
	input.setAttribute("type","hidden");
	input.setAttribute("name","pet"+count);
	
	//Value is the file extension if pet is selected for wish list.
	button_wishList.addEventListener('click',function(){
		if (button_wishList.textContent == "Add to Wish List"){
			button_wishList.textContent = "Don't Add to Wish List";
			input.setAttribute("value",name+"/"+gender+"/"+breed+"/"+name+".jpg");
		}
		else{
			button_wishList.textContent = "Add to Wish List";
			input.setAttribute("value","");
		}
	});
	button_viewProfile.addEventListener('click',function(){
		console.log('you click on view pet profile for dog');
	});
	button_div.append(button_wishList,button_viewProfile);
	
	Dogs.appendChild(input);
	return button_div;
}
function doesFileExist(urlToFile) {
	var xhr = new XMLHttpRequest();
	xhr.open('HEAD', urlToFile, false);
	xhr.send();
	if (xhr.status == "404") {
		return false;
	} else {
		return true;
	}
}
function comparisons(name,names){
	var x = false;
	var i;
	for (i = 0; i < names.length; i++) {
		if (name.toLowerCase() === names[i].toLowerCase()){
			x = true;
		}
	}
	return x;
}
</script>
                </section>
            </section> <!--end section for pet display-->
        </main>

        <footer>
            <nav">
                <ul class="navList">
                    <li><a href="/Web_Dev/index.php">Home</a></li>
                    <li><a href="/Web_Dev/about.html">About</a></li>
                    <li><a href="/Web_Dev/contact_us.html">Contact Us</a></li>
                    <li><a href="/Web_Dev/wish_list.php">My Wish List</a></li>
                    <li><a href="/Web_Dev/find_pet.html">Find Pet</a></li>              
                </ul>
            </nav>
            <h1 class="footer-logo"><a href="/Web_Dev/index.php">Agile <br>Adoption</a></h1>
        </footer>
    </body>
</html>