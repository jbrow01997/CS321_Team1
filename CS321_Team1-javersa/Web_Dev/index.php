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
		<div id="profiles">
		</div>
<script>

//Stores the variables from the find_pet page.
var name = "<?php echo $name;?>";
var gender = "<?php echo $gender;?>";
var breed = "<?php echo $dog;?>";

//Builds off of div
var Dogs = document.getElementById("dogs");
var Profiles = document.getElementById("profiles");

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
		var p = Profiles.appendChild(createPetProfile(name,gender,breed,img));
		d.appendChild(createPetButtons(p,name,gender,breed,count));
		count = count + 1;
	}
	return count;
}
function createPetProfile(name,gender,breed,img){
	var profile = document.createElement('div');
	profile.classList.add("modal");
	
	var profileFront = document.createElement('div');
	profileFront.classList.add("modal-front");
	profile.appendChild(profileFront);
	
	var profileHeader = document.createElement('div');
	profileHeader.classList.add("modal-header");
	profileFront.appendChild(profileHeader);
	
	var xbtn = document.createElement('span');
	xbtn.classList.add("close");
	xbtn.innerHTML = "x";
	xbtn.onclick = function(){profile.style.display = 'none';};
	profileHeader.appendChild(xbtn);
	
	var header = document.createElement('h2');
	header.textContent = name;
	profileHeader.appendChild(header);
	
	var modal_body = document.createElement('div');
	modal_body.classList.add("modal-body");
	profileFront.appendChild(modal_body);
		
	var modal_pad_left = document.createElement('div');
	modal_pad_left.classList.add("body-pad-left");
	modal_body.appendChild(modal_pad_left);
	
	var modal_body_left = document.createElement('div');
	modal_body_left.classList.add("modal-body-left");
	modal_body.appendChild(modal_body_left);
	
	var tac = document.createElement('div');
	tac.style.textAlign = 'center';
	modal_body_left.appendChild(tac);
	
	var pi = document.createElement('img');
	pi.classList.add("pet-img");
	pi.setAttribute("src",img);
	pi.setAttribute("alt","Pet Image");
	tac.appendChild(pi);
	
	var modal_body_right = document.createElement('div');
	modal_body_right.classList.add("modal-body-right");
	modal_body.appendChild(modal_body_right);
	
	var profile_info1 = document.createElement('div');
	profile_info1.classList.add("profile-info");
	modal_body_right.appendChild(profile_info1);
	
	var info_header1 = document.createElement('p');
	info_header1.classList.add("info-header");
	info_header1.textContent = "Pet Facts";
	profile_info1.appendChild(info_header1);
	
	var profile_selections1 = document.createElement('div');
	profile_selections1.classList.add("profile-sections");
	profile_info1.appendChild(profile_selections1);
	
	var fact_left1 = document.createElement('div');
	fact_left1.classList.add("fact-left");
	profile_selections1.appendChild(fact_left1);
	
	var info1 = document.createElement('p');
	info1.classList.add("info-h2");
	fact_left1.appendChild(info1);
	
	var name1 = document.createElement('b');
	name1.classList.add("info-h1");
	name1.innerHTML = "Name:";
	info1.appendChild(name1);
	info1.innerHTML += " " + name + "<br>";
					
	var breed1 = document.createElement('b');
	breed1.classList.add("info-h1");
	breed1.innerHTML = "Breed:";
	info1.appendChild(breed1);
	info1.innerHTML += " " + breed + "<br>";
								
	var color1 = document.createElement('b');
	color1.classList.add("info-h1");
	color1.innerHTML = "Color:";
	info1.appendChild(color1);
	info1.innerHTML += " " + "<br>";
								
	var age1 = document.createElement('b');
	age1.classList.add("info-h1");
	age1.innerHTML = "Age:";
	info1.appendChild(age1);
	info1.innerHTML += " " + "<br>";
								
	var size1 = document.createElement('b');
	size1.classList.add("info-h1");
	size1.innerHTML = "Size:";
	info1.appendChild(size1);
	info1.innerHTML += " " + "<br>";
	
	var fact_right1 = document.createElement('div');
	fact_right1.classList.add("fact-right");
	profile_selections1.appendChild(fact_right1);
	
	var info2 = document.createElement('p');
	info2.classList.add("info-h2");
	fact_right1.appendChild(info2);
	
	var gender1 = document.createElement('b');
	gender1.classList.add("info-h1");
	gender1.innerHTML = "Gender:";
	info2.appendChild(gender1);
	info2.innerHTML += " " + gender + "<br>";
	
	var pet_id1 = document.createElement('b');
	pet_id1.classList.add("info-h1");
	pet_id1.innerHTML = "Pet ID:";
	info2.appendChild(pet_id1);
	info2.innerHTML += " " + "<br>";
	
	var location1 = document.createElement('b');
	location1.classList.add("info-h1");
	location1.innerHTML = "Location:";
	info2.appendChild(location1);
	info2.innerHTML += " " + "<br>";
	
	var shelter1 = document.createElement('b');
	shelter1.classList.add("info-h1");
	shelter1.innerHTML = "Shelter:";
	info2.appendChild(shelter1);
	info2.innerHTML += " " + "<br>";
	
	var shelter_contact1 = document.createElement('b');
	shelter_contact1.classList.add("info-h1");
	shelter_contact1.innerHTML = "Shelter Contact:";
	info2.appendChild(shelter_contact1);
	info2.innerHTML += " " + "<br>";
	
	var profile_info2 = document.createElement('div');
	profile_info2.classList.add("profile-info");
	modal_body_right.appendChild(profile_info2);
	
	var info_header2 = document.createElement('p');
	info_header2.classList.add("info-header");
	info_header2.textContent = "Pet Info";
	profile_info2.appendChild(info_header2);
	
	var profile_selections2 = document.createElement('div');
	profile_selections2.classList.add("profile-sections");
	profile_info2.appendChild(profile_selections2);
	
	var info_left1 = document.createElement('div');
	info_left1.classList.add("info-left");
	profile_selections2.appendChild(info_left1);
	
	var u1 = document.createElement('ul');
	u1.classList.add("info-h2");
	u1.style.marginLeft = "50px";
	info_left1.appendChild(u1);
	
	var l1 = document.createElement('li');
	l1.innerHTML = "Neutered";
	u1.appendChild(l1);
	var l2 = document.createElement('li');
	l2.innerHTML = "Vaccinated";
	u1.appendChild(l2);
	var l3 = document.createElement('li');
	l3.innerHTML = "Good with kids";
	u1.appendChild(l3);
	var l4 = document.createElement('li');
	l4.innerHTML = "House trained";
	u1.appendChild(l4);
	
	var info_mid1 = document.createElement('div');
	info_mid1.classList.add("info-mid");
	profile_selections2.appendChild(info_mid1);
	
	var u2 = document.createElement('ul');
	u2.classList.add("info-h2");
	u2.style.marginLeft = "50px";
	info_mid1.appendChild(u2);
	
	var l5 = document.createElement('li');
	l5.innerHTML = "";
	u2.appendChild(l5);
	var l6 = document.createElement('li');
	l6.innerHTML = "";
	u2.appendChild(l6);
	var l7 = document.createElement('li');
	l7.innerHTML = "";
	u2.appendChild(l7);
	var l8 = document.createElement('li');
	l8.innerHTML = "";
	u2.appendChild(l8);
	
	var info_right1 = document.createElement('div');
	info_right1.classList.add("info-right");
	profile_selections2.appendChild(info_right1);
	
	var u3 = document.createElement('ul');
	u3.classList.add("info-h2");
	u3.style.marginLeft = "50px";
	info_right1.appendChild(u3);
	
	var l9 = document.createElement('li');
	l9.innerHTML = "";
	u3.appendChild(l9);
	var l10 = document.createElement('li');
	l10.innerHTML = "";
	u3.appendChild(l10);
	var l11 = document.createElement('li');
	l11.innerHTML = "";
	u3.appendChild(l11);
	var l12 = document.createElement('li');
	l12.innerHTML = "";
	u3.appendChild(l12);
	
	var story_info = document.createElement('div');
	story_info.classList.add("story-info");
	modal_body_right.appendChild(story_info);
	
	var info_header3 = document.createElement('p');
	info_header3.classList.add("info-header");
	info_header3.textContent = "My Story";
	story_info.appendChild(info_header3);
	
	var story = document.createElement('div');
	story.classList.add("story");
	story.innerHTML = "Coming soon!";
	story_info.appendChild(story);
	
	var body_pad_right = document.createElement('div');
	body_pad_right.classList.add("body-pad-right");
	modal_body.appendChild(body_pad_right);
	
	var modal_footer = document.createElement('div');
	modal_footer.classList.add("modal-footer");
	profileFront.appendChild(modal_footer);
	
	return profile;
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
function createPetButtons(profile,name,gender,breed,count){
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
			profile.style.display = 'block';
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
    </body>
</html>