<!DOCTYPE html>
<html lang="en" class="wish-list">
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
            <!--start section for pet display-->
            <section>
                <div id="myList" class="pet-display-header">
                    <h2 class="section__title">My Wish List</h2>
					<!--need add object here-->
                </div>
            </section>
                <section class="pets-wrapper">
                    <div id="dogs" class="pets">
                    </div>
					<br><br>
					<button class="find-wrapper" onclick="clearList()">Clear Wish List</button><br>
					
<?php $count = $_POST["count"];?>
<?php
	for ($i = 0; $i < $count; $i++){
		$demo = "pet" . $i;
		$list[] = $_POST[$demo];
		$i;
	}
	$i = 0;
?>
<script>
//Borrowed code.
var list = <?php echo '["' . implode('", "', $list) . '"]' ?>;
var storedAddresses = JSON.parse(localStorage.getItem("wishes"));
if (storedAddresses == null){
	var list1 = [];
	for (l of list){
		if (l != ""){
			list1.push(l);
		}
	}
	localStorage.setItem("wishes",JSON.stringify(list1));
}
else{
	for (var m of list){
		if (!storedAddresses.includes(m)){
			storedAddresses.push(m);
		}
	}
	localStorage.setItem("wishes",JSON.stringify(storedAddresses));
}
var count = 0;
var Dogs = document.getElementById("dogs");
if (storedAddresses != null){
	for (var element of storedAddresses){
		createPet(element,count);
	}
}
function createPet(element,count){
	var parts = element.split("/");
	var img = "../Web_Dev/pet_images/" + element;
	if (img.length > 22){
		var d = Dogs.appendChild(createNewPetElement(parts[0]));
		d.appendChild(createPetTitle(parts[0]));
		d.appendChild(createPetImage(img));
		d.appendChild(createPetInformation(parts[1],parts[2]));
		d.appendChild(createPetButtons(element,count));
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
function createPetButtons(element,count){
	let button_div = document.createElement('div');
	let button_wishList = document.createElement('a');
	let button_viewProfile = document.createElement('a');
	let input = document.createElement("INPUT");
	
	button_div.classList.add('btn__wrapper');
	
	button_wishList.classList.add('btn');
	button_wishList.classList.add('btn-color');
	button_wishList.textContent = 'Remove from Wish List';
	
	button_viewProfile.classList.add('btn');
	button_viewProfile.classList.add('btn-color');
	button_viewProfile.textContent = "View Pet Profile";
	
	input.setAttribute("type","hidden");
	input.setAttribute("name","pet"+count);
	
	
	button_wishList.addEventListener('click',function(){
		var new_list = [];
		for (var address of storedAddresses){
			if (element != address){
				new_list.push(address);
			}
		}
		localStorage.setItem("wishes",JSON.stringify(new_list));
		location.reload();
	});
	button_viewProfile.addEventListener('click',function(){
		console.log('you click on view pet profile for dog');
	});
	button_div.append(button_wishList,button_viewProfile);
	
	Dogs.appendChild(input);
	return button_div;
}
function clearList(){
	localStorage.setItem("wishes",null);
	location.reload();
}
</script>
                    
                </section><!--end section for pet display-->
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